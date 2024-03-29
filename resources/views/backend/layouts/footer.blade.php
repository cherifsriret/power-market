
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="javascript:void(0)" target="_blank">Sriret Cherif Amine</a> {{Carbon\Carbon::now()->Format('Y')}}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  {{-- Begin Chat Componenet --}}
  <a class="chat-btn-principal " href="javascript:void(0)" onclick="$('.chat-box-principal').toggle()">
    <i class="fas fas fa-comment"></i>
  </a>

  <div class="chat-box-principal">

    <div class="main">
        <div class="px-2 scroll" id="chat-list-msg">
        </div>
        <nav class="navbar bg-white navbar-expand-sm d-flex justify-content-between"> <input type="text" name="text" class="form-control msg-text"  id="chat_sent_msg_input" placeholder="Enter your message...">
            <button type="button" class="icondiv btn d-flex justify-content-end align-content-center text-center ml-2" onclick="sendChatMessage()">  <i class="fa fa-arrow-circle-left icon2"></i> </button>
        </nav>
    </div>



</div>

{{-- End Chat Componenet --}}

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  {{-- <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script> --}}
  {{-- <script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script> --}}

  @stack('scripts')

  <script>
    setTimeout(function(){
      $('.alert').slideUp();
    },4000);
  </script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
fetchMessages();
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher("58f7bda569b69aa6e050", {
    cluster: 'eu'
  });

  var channel = pusher.subscribe('chat');
  channel.bind('my-event', function(data) {
    fetchMessages();
  });

function sendChatMessage() {

    $.ajax({
            method: 'post',
            url:  "{{route('social.chat.send')}}",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            beforeSend: function beforeSend(request) {
                request.setRequestHeader(
                    "Content-Language",
                    $("html").attr("lang")
                );
            },
            data: {'message': $('#chat_sent_msg_input').val()}
        })
            .done(function(resp) {
                //reload messages
            })
            $('#chat_sent_msg_input').val("")
}

function fetchMessages() {
    $.ajax({
            method: 'get',
            url:  "{{route('social.chat.fetch')}}",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            beforeSend: function beforeSend(request) {
                request.setRequestHeader(
                    "Content-Language",
                    $("html").attr("lang")
                );
            },
        })
            .done(function(resp) {
                $('#chat-list-msg').html('');

                let msg = ``;

                resp.map((e,i)=>{
                    console.log(e.user.id == "{{Auth::user()->id}}");
                    if(e.user.id == "{{Auth::user()->id}}")
                    {
                        msg +=
                    ` <div class="d-flex align-items-center">
                        <div class="text-left pr-1"><img src="{{asset('user-images/profile-default-image.jpeg')}}" width="30" class="img1" /></div>
                        <div class="pr-2 pl-1"> <span class="name">${e.user.name}</span>
                            <p class="msg">${e.message}</p>
                        </div>
                    </div>`
                    }
                    else
                    {
                        msg +=  `<div class="d-flex align-items-center text-right justify-content-end ">
                                        <div class="pr-2"> <span class="name">${e.user.name}</span>
                                            <p class="msg">${e.message}</p>
                                        </div>
                                        <div><img src="{{asset('user-images/profile-default-image.jpeg')}}" width="30" class="img1" /></div>
                                    </div>`
                    }

                });




                $('#chat-list-msg').html(msg);
                var element = document.getElementById('chat-list-msg');
                element.scrollTop = element.scrollHeight;
            })
            .fail(function(resp) {
                console.log(resp);
            });
        }
</script>
