@extends('main.layouts.master')

@section('main-content')
   <!-- Start Register Sign Up -->
   <div class="signup group-register">
    <div class="row">
        <div class="col-md-6">
            <div class="bg-image">
                <img src="template/images/register/sign-up.jpg" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="members-form">
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
                                            <input type="text" name="username"
                                                class="form-control name-member"
                                                placeholder=" أدخل اسم المستخدم"
                                                required="required"
                                                value="<?php if(isset($user)){ echo $user; } ?>"
                                                oninvalid="this.setCustomValidity('لا يمكن أن يكون اسم المستخدم فارغًا')"
                                                oninput="this.setCustomValidity('')" />
                                            <div class="alert alert-danger custom-alert">
                                                <i class="fas fa-info"></i> لا يمكن أن يكون اسم المستخدم فارغًا
                                            </div>
                                        </div>
                                        <!-- End UserName Field -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Start Password Field -->
                                    <div class="form-group">
                                        <label for="" class="control-label">كلمة المرور</label>
                                        <input type="password"
                                            name="passwords"
                                            placeholder="أدخل كلمة المرور"
                                            class="form-control password password-member" required="required"
                                            autocomplete="new-password"
                                            value="<?php if(isset($hashPass)){ echo $hashPass; } ?>"
                                            oninvalid="this.setCustomValidity('لا يمكن أن تكون كلمة المرور فارغًا')"
                                            oninput="this.setCustomValidity('')"/>
                                        <i class="show-password fas fa-low-vision"></i>
                                        <div class="alert alert-danger custom-alert">
                                                <i class="fas fa-info"></i> لا يمكن أن تكون كلمة المرور فارغًا
                                        </div>
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
                                                value="<?php if(isset($email)){ echo $email; } ?>"
                                                oninvalid="this.setCustomValidity(' لا يمكن أن يكون البريد الإلكتروني فارغًا')"
                                                oninput="this.setCustomValidity('')"/>
                                            <div class="alert alert-danger custom-alert">
                                                <i class="fas fa-info"></i> لا يمكن أن يكون البريد الإلكتروني فارغًا
                                            </div>
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
                                                value="<?php if(isset($governorate)){ echo $governorate; } ?>"
                                                oninvalid="this.setCustomValidity(' لايمكن ان تكون المحافظة فارغة')"
                                                oninput="this.setCustomValidity('')"/>
                                            <div class="alert alert-danger custom-alert">
                                                <i class="fas fa-info"></i> لايمكن ان تكون المحافظة فارغة
                                            </div>
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
                                                    value="<?php if(isset($city)){ echo $city; } ?>"
                                                    oninvalid="this.setCustomValidity('لا يمكن أن تكون المدينة فارغة')"
                                                    oninput="this.setCustomValidity('')"/>
                                                <div class="alert alert-danger custom-alert">
                                                    <i class="fas fa-info"></i> لا يمكن أن تكون المدينة فارغة
                                                </div>
                                            </div>
                                            <!-- End city Field -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Start region Field -->
                                    <div class="form-group">
                                        <label for="" class="control-label">المنطقة</label>
                                        <input type="text" name="region"
                                            placeholder=" أدخل المنطقة "
                                            value="<?php if(isset($region)){ echo $region; } ?>"
                                            class="form-control region-member" required="required"
                                            oninvalid="this.setCustomValidity('لا يمكن أن تكون المنطقة فارغة')"
                                            oninput="this.setCustomValidity('')"/>
                                        <div class="alert alert-danger custom-alert">
                                            <i class="fas fa-info"></i> لا يمكن أن تكون المنطقة فارغة
                                        </div>
                                    </div>
                                    <!-- End region Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start buildingNumber Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">رقم العمارة</label>
                                            <input type="text" name="buildingNumber"
                                                placeholder="أدخل رقم العمارة "
                                                class="form-control bulid-member"
                                                value="<?php if(isset($buildingNumber)){ echo $buildingNumber; } ?>"
                                                required="required"
                                                oninvalid="this.setCustomValidity('لا يمكن أن يكون رقم المبنى فارغًا')"
                                                oninput="this.setCustomValidity('')"/>
                                            <div class="alert alert-danger custom-alert">
                                                <i class="fas fa-info"></i> لا يمكن أن يكون رقم المبنى فارغًا
                                            </div>
                                        </div>
                                        <!-- End buildingNumber Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start role Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">الدور</label>
                                            <input type="text" name="role"
                                                placeholder="أدخل رقم الدور "
                                                class="form-control role-member"
                                                required="required"
                                                value="<?php if(isset($role)){ echo $role; } ?>"
                                                oninvalid="this.setCustomValidity('لا يمكن أن يكون الدور فارغًا')"
                                                oninput="this.setCustomValidity('')"/>
                                            <div class="alert alert-danger custom-alert">
                                                <i class="fas fa-info"></i> لا يمكن أن يكون الدور فارغًا
                                            </div>
                                        </div>
                                        <!-- End role Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start apartmentNumber Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">رقم الشقة</label>
                                            <input type="text" name="apartmentNumber"
                                                placeholder="أدخل رقم الشقة  "
                                                class="form-control apartment-member" required="required"
                                                value="<?php if(isset($apartmentNumber)){ echo $apartmentNumber; } ?>"
                                                oninvalid="this.setCustomValidity('لا يمكن أن يكون رقم الشقة فارغًا')"
                                                oninput="this.setCustomValidity('')"/>
                                            <div class="alert alert-danger custom-alert">
                                                <i class="fas fa-info"></i> لا يمكن أن يكون رقم الشقة فارغًا
                                            </div>
                                        </div>
                                        <!-- End apartmentNumber Field -->
                                </div>
                                <div class="col-md-6">
                                        <!-- Start phoneNumber Field -->
                                        <div class="form-group">
                                            <label for="" class="control-label">رقم الهاتف</label>
                                            <input type="text" name="phoneNumber"
                                                placeholder="أدخل رقم الهاتف"
                                                class="form-control phone-member" required="required"
                                                value="<?php if(isset($phoneNumber)){ echo $phoneNumber; } ?>"
                                                oninvalid="this.setCustomValidity('لا يمكن ان يكون رقم الهاتف فارغا')"
                                                oninput="this.setCustomValidity('')"/>
                                            <div class="alert alert-danger custom-alert">
                                                <i class="fas fa-info"></i> لا يمكن ان يكون رقم الهاتف فارغا
                                            </div>
                                        </div>
                                        <!-- End phoneNumber Field -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">نوع المسجل</label>
                                        <select name="GroupId" id="GroupId" class="form-control record-member" required="required ">
                                            <option value="" hidden>أختر</option>
                                            <option value="0">مستأجر</option>
                                            <option value="1">مالك</option>
                                            <option value="2">رئيس اتحاد ملاك</option>
                                        </select>
                                        <div class="alert alert-danger custom-alert">
                                            <i class="fas fa-info"></i> لا يمكن ان يكون نوع التسجيل فارغا
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>اذا كنت تمتلك حساب فقم <a href="signIn.php">بتسجيل الدخول</a></h3>
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
