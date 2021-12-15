<template>
   <div class="row">

       <div class="col-8">
           <div class="card card-default">
               <div class="card-header">Messages</div>
               <div class="card-body p-0">
                   <ul class="list-unstyled" style="height:300px; overflow-y:scroll" v-chat-scroll>
                       <li class="p-2" v-for="(message, index) in messages" :key="index" >
                           <strong>{{ message.user.name }}</strong>
                           {{ message.message }}
                       </li>
                   </ul>
               </div>

               <input
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    placeholder="Enter your message..."
                    class="form-control">
           </div>
       </div>

        <div class="col-4">
            <div class="card card-default">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2" v-for="(user, index) in users" :key="index">
                            {{ user.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

   </div>
</template>

<script>
import  Pusher from 'pusher-js'
    export default {
        props:['user'],
        data() {
            return {
                messages: [],
                newMessage: '',
                users:[],
                activeUser: false,
                typingTimer: false,
            }
        },
        created() {

let self=this;
        Pusher.logToConsole = true;

        const pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
        cluster: 'eu'
        });

        var channel = pusher.subscribe('chat');
        channel.bind('my-event', function(data) {
           self.fetchMessages();
        });
        this.fetchMessages();
        },
        methods: {
            fetchMessages() {
                axios.get(process.env.MIX_APP_URL+'/admin/social/messages').then(response => {
                    this.messages = response.data;
                })
            },
            sendMessage() {
                this.messages.push({
                    user: this.user,
                    message: this.newMessage
                });
                axios.post(process.env.MIX_APP_URL+'/admin/social/messages', {message: this.newMessage});
                this.newMessage = '';
            },
        }
    }
</script>
