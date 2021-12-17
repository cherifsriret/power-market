@extends('main.layouts.master')

@section('main-content')
  <!-- Start Make Complaint -->
  <div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3>تقديم شكوي !</h3>
        </div>
    </div>
</div>
<div class="group-register complaint">
<div class="row">
<div class="col-md-7">
    <form action="{{route('customerComplaintsAdd.submit')}}" method="POST" class="complaints-form" id="Makecomplaint">
        {{csrf_field()}}
        <h2>قم بكتابة شكوتك لناسعدك في حلها !</h2>
        <p>ما هو لوريم ايبسوم لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص</p>
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                         @foreach ($errors->all() as $error)
                         {{ $error }}<br>
                         @endforeach
            </div>
        @endif

        <?php if(isset($ErrorMessage)){ echo $ErrorMessage; } ?>
        <?php if(isset($success)){ echo $success; } ?>
        <div class="row">

            <div class="col-md-6">
                    <!-- Start Entity Name Field -->
                    <div class="form-group">
                        <label for="" class="control-label"> الاسم </label>
                        <input
                            type="text" name="name"
                            class="form-control complaint-name"
                            placeholder="ادخل الاسم  ......"
                            required="required"
                            value="{{old('name')}}"
                            oninvalid="this.setCustomValidity('لا يمكن أن يكون الاسم فارغًا')"
                            oninput="this.setCustomValidity('')" />
                            <div class="alert alert-danger custom-alert">
                                <i class="fas fa-info"></i> لا يمكن أن يكون الاسم فارغًا
                            </div>
                    </div>
                    <!-- End Entity Name Field -->
            </div>
            <div class="col-md-6">
                <!-- Start Complaint National  Field -->
                <div class="form-group">
                    <label for="" class="control-label">  الرقم القومي </label>
                    <input type="text" name="national_id"
                            placeholder=" ادخل الرقم القومي المكون من 14 رقم "
                            class="form-control complaint-national" required="required"
                            value="{{old('national_id')}}"
                            oninvalid="this.setCustomValidity('لا يمكن أن يكون الرقم القومي فارغًا')"
                            oninput="this.setCustomValidity('')"/>
                    <div class="alert alert-danger custom-alert">
                        <i class="fas fa-info"></i> لا يمكن أن يكون الرقم القومي  فارغًا
                    </div>
                </div>
                <!-- End Complaint National Field -->
            </div>
            <div class="col-md-6">
                <!-- Start Complaint Phone  Field -->
                <div class="form-group">
                    <label for="" class="control-label"> رقم الهاتف </label>
                    <input type="text" name="phone"
                            placeholder=" ادخل رقم هاتف  "
                            class="form-control complaint-phone" required="required"
                            value="{{old('phone')}}"
                            oninvalid="this.setCustomValidity('لا يمكن أن يكون رقم هاتف  فارغًا')"
                            oninput="this.setCustomValidity('')"/>
                    <div class="alert alert-danger custom-alert">
                        <i class="fas fa-info"></i> لا يمكن أن يكون رقم هاتف  فارغًا
                    </div>
                </div>
                <!-- End Complaint Phone Field -->
            </div>
            <div class="col-md-6">
                <!-- Start Complaint Email  Field -->
                <div class="form-group">
                    <label for="" class="control-label"> البريد الالكتروني </label>
                    <input type="text" name="email"
                            placeholder=" ادخل البريد الالكتروني  "
                            class="form-control complaint-email" required="required"
                            value="{{old('email')}}"
                            oninvalid="this.setCustomValidity('لا يمكن أن يكون البريد الالكتروني  فارغًا')"
                            oninput="this.setCustomValidity('')"/>
                    <div class="alert alert-danger custom-alert">
                        <i class="fas fa-info"></i> لا يمكن أن يكون البريد الالكتروني  فارغًا
                    </div>
                </div>
                <!-- End Complaint Email Field -->
            </div>
            <div class="col-md-6">
                <!-- Start Complaint Address  Field -->
                <div class="form-group">
                    <label for="" class="control-label"> العنوان </label>
                    <input type="text" name="address"
                            placeholder=" ادخل العنوان  "
                            class="form-control complaint-address" required="required"
                            value="{{old('address')}}"
                            oninvalid="this.setCustomValidity('لا يمكن أن يكون رقم هاتف  فارغًا')"
                            oninput="this.setCustomValidity('')"/>
                    <div class="alert alert-danger custom-alert">
                        <i class="fas fa-info"></i> لا يمكن أن يكون العنوان  فارغًا
                    </div>
                </div>
                <!-- End Complaint Address Field -->
            </div>
            <div class="col-md-6">
                <!-- Start Complaint Text  Field -->
                <div class="form-group">
                    <label for="" class="control-label"> الشكوي </label>
                    <textarea name="description" placeholder=" ادخل الشكوي الخاص بك .......  " class="form-control complaint-text" required="required" oninvalid="this.setCustomValidity('لا يمكن أن يكون موضوع الشكوي  فارغًا')" oninput="this.setCustomValidity('')">{{old('description')}}</textarea>
                    <div class="alert alert-danger custom-alert">
                        <i class="fas fa-info"></i> لا يمكن أن يكون موضوع الشكوي  فارغًا
                    </div>
                </div>
                <!-- End Complaint Text Field -->
            </div>
        </div>
        <div class="form-group">
            <div class="send">
                <button type="submit" name="submitAdd" class="default-btn">ارسال</button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-5">
    <div class="bg-image">
    <img src=" {{asset('main/images/complaint.jpg')}}" alt="">


    </div>
</div>
</div>
</div>
@endsection
