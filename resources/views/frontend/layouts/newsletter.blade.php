
<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>{{trans('frontend.newsletter')}}</h4>
                        <p> {{trans('frontend.subscribe_to_our_newsletter')}} <span>10%</span> {{trans('frontend.off_your_first_purchase')}}</p>
                        <form action="{{route('subscribe')}}" method="post" class="newsletter-inner">
                            @csrf
                            <input name="email" placeholder="{{trans('frontend.your_email_address')}}" required="" type="email">
                            <button class="btn" type="submit">{{trans('frontend.subscribe')}}</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->
