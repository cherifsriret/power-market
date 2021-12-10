@extends('main.layouts.master')

@section('main-content')
   <!-- Start Register Sign Up -->
   <div class="signup group-register">
    <div class="row">
        <div class="col-md-6">
            <div class="bg-image">
                <img src="{{asset('main/images/register/sign-up.jpg')}}" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('register.submit')}}" method="POST" class="members-form">
                        {{csrf_field()}}
                            <h2>قم بالتسجيل في موقعنا</h2>
                            <p>
                                ما هو لوريم ايبسوم لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض
                                على العميل ليتصور طريقه وضع النصوص  ...
                            </p>
                            <?php if(! empty($formErrors)){ ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php
                                            foreach($formErrors as $error){
                                                echo $error . '</br>' ;
                                            }
                                        ?>
                                </div>
                            <?php } ?>
                            <?php if(isset($ErrorMessage)){ echo $ErrorMessage; } ?>
                            <?php if(isset($success)){ echo $success; } ?>
                            <div class="row">
                                <div class="col-md-6">
                                        <!-- Start UserName Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">اسم المستخدم</label>
                                            <input type="text" name="name"
                                                class="form-control name-member"
                                                placeholder=" أدخل اسم المستخدم"
                                                required="required"
                                                value="{{old('name')}}"
                                                oninvalid="this.setCustomValidity('لا يمكن أن يكون اسم المستخدم فارغًا')"
                                                oninput="this.setCustomValidity('')" />
                                                @error('name')
                                                    <div class="alert alert-danger mt-1">
                                                        <i class="fas fa-info"></i> {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                        <!-- End UserName Field -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Start Password Field -->
                                    <div class="form-group">
                                        <label for="" class="control-label">كلمة المرور</label>
                                        <input type="password"
                                            name="password"
                                            placeholder="أدخل كلمة المرور"
                                            class="form-control password password-member" required="required"
                                            autocomplete="new-password"
                                            value="{{old('password')}}"
                                            oninvalid="this.setCustomValidity('لا يمكن أن تكون كلمة المرور فارغًا')"
                                            oninput="this.setCustomValidity('')"/>
                                        <i class="show-password fas fa-low-vision"></i>
                                        @error('password')
                                        <div class="alert alert-danger mt-1">
                                            <i class="fas fa-info"></i> {{$message}}
                                        </div>
                                    @enderror
                                    </div>
                                    <!-- End Password Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start Email Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">البريد الالكتروني</label>
                                            <input type="email" name="email"
                                                placeholder="أدخل البريد الالكتروني"
                                                class="form-control email-member" required="required"
                                                value="{{old('email')}}"
                                                oninvalid="this.setCustomValidity(' لا يمكن أن يكون البريد الإلكتروني فارغًا')"
                                                oninput="this.setCustomValidity('')"/>
                                                @error('email')
                                                <div class="alert alert-danger mt-1">
                                                    <i class="fas fa-info"></i> {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- End Email Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start Full Name Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">المحافظة</label>
                                            <input type="text" name="governorate"
                                                placeholder="أدخل المحافظة"
                                                class="form-control gov-member" required="required"
                                                value="{{old('governorate')}}"
                                                oninvalid="this.setCustomValidity(' لايمكن ان تكون المحافظة فارغة')"
                                                oninput="this.setCustomValidity('')"/>
                                                @error('governorate')
                                                <div class="alert alert-danger mt-1">
                                                    <i class="fas fa-info"></i> {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- End Full Name Field -->
                                </div>
                                <div class="col-md-6">
                                            <!-- Start city Field -->
                                            <div class="form-group">
                                                <label for="" class="control-label">المدينة</label>
                                                <input type="text" name="city"
                                                    placeholder=" أدخل المدينة"
                                                    class="form-control city-member" required="required"
                                                    value="{{old('city')}}"
                                                    oninvalid="this.setCustomValidity('لا يمكن أن تكون المدينة فارغة')"
                                                    oninput="this.setCustomValidity('')"/>
                                                    @error('city')
                                                    <div class="alert alert-danger mt-1">
                                                        <i class="fas fa-info"></i> {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!-- End city Field -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Start region Field -->
                                    <div class="form-group">
                                        <label for="" class="control-label">المنطقة</label>
                                        <input type="text" name="region"
                                            placeholder=" أدخل المنطقة "
                                            value="{{old('region')}}"
                                            class="form-control region-member" required="required"
                                            oninvalid="this.setCustomValidity('لا يمكن أن تكون المنطقة فارغة')"
                                            oninput="this.setCustomValidity('')"/>
                                            @error('region')
                                            <div class="alert alert-danger mt-1">
                                                <i class="fas fa-info"></i> {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- End region Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start buildingNumber Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">رقم العمارة</label>
                                            <input type="text" name="building"
                                                placeholder="أدخل رقم العمارة "
                                                class="form-control bulid-member"
                                                value="{{old('building')}}"
                                                required="required"
                                                oninvalid="this.setCustomValidity('لا يمكن أن يكون رقم المبنى فارغًا')"
                                                oninput="this.setCustomValidity('')"/>
                                                @error('building')
                                                    <div class="alert alert-danger mt-1">
                                                        <i class="fas fa-info"></i> {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                        <!-- End buildingNumber Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start role Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">الدور</label>
                                            <input type="text" name="stage"
                                                placeholder="أدخل رقم الدور "
                                                class="form-control role-member"
                                                required="required"
                                                value="{{old('stage')}}"
                                                oninvalid="this.setCustomValidity('لا يمكن أن يكون الدور فارغًا')"
                                                oninput="this.setCustomValidity('')"/>
                                                @error('stage')
                                                    <div class="alert alert-danger mt-1">
                                                        <i class="fas fa-info"></i> {{$message}}
                                                    </div>
                                                @enderror

                                        </div>
                                        <!-- End role Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start apartmentNumber Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">رقم الشقة</label>
                                            <input type="text" name="apartment_number"
                                                placeholder="أدخل رقم الشقة  "
                                                class="form-control apartment-member" required="required"
                                                value="{{old('apartment_number')}}"
                                                oninvalid="this.setCustomValidity('لا يمكن أن يكون رقم الشقة فارغًا')"
                                                oninput="this.setCustomValidity('')"/>
                                                @error('apartment_number')
                                                    <div class="alert alert-danger mt-1">
                                                        <i class="fas fa-info"></i> {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                        <!-- End apartmentNumber Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start phoneNumber Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">رقم الهاتف</label>
                                            <input type="text" name="phone"
                                                placeholder="أدخل رقم الهاتف"
                                                class="form-control phone-member" required="required"
                                                value="{{old('phone')}}"
                                                oninvalid="this.setCustomValidity('لا يمكن ان يكون رقم الهاتف فارغا')"
                                                oninput="this.setCustomValidity('')"/>
                                                @error('phone')
                                                    <div class="alert alert-danger mt-1">
                                                        <i class="fas fa-info"></i> {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                        <!-- End phoneNumber Field -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">نوع المسجل</label>
                                        <select name="user_type" id="GroupId" class="form-control record-member" required="required ">
                                            <option value="" hidden>أختر</option>
                                            <option value="tenant">مستأجر</option>
                                            <option value="owner">مالك</option>
                                            <option value="owners_association_president">رئيس اتحاد ملاك</option>
                                        </select>
                                        @error('user_type')
                                            <div class="alert alert-danger mt-1">
                                                <i class="fas fa-info"></i> {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>اذا كنت تمتلك حساب فقم <a href="{{route("login")}}">بتسجيل الدخول</a></h3>
                                </div>
                            </div>
                            <!-- Start Submit  Field -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 ">
                                    <input type="submit" value="أضافة" name="submitAdd" class="default-btn" />
                                </div>
                            </div>
                            <!-- End Submit Field -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Register Sign Up -->
@endsection
