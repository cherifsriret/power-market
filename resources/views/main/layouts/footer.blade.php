  <!-- Start Button Scroll Top -->
  <div class="go-top active"><i class="fas fa-angle-double-up"></i></div>
  <!-- End Button Scroll Top -->

  <!-- Start Footer -->
  <footer class="footer-area footer-bg">
      <div class="container">
          <div class="footer-top">
              <div class="row">
                  <div class="col-lg-4 col-sm-6">
                      <div class="footer-widget">
                          <div class="footer-logo">
                              <a href="index.html">
                                  <img src="{{asset('main/images/logo-remove.png')}}"alt="Images">
                              </a>
                          </div>
                          <p>
                              ما هو لوريم ايبسوم لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                          </p>
                          <div class="footer-call-content">
                              <h3>تحدث إلى دعمنا</h3>
                              <span><a href="tel:+1002-123-4567">+1 002-123-4567</a></span>
                              <i class="fas fa-headphones-alt"></i>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-2 col-6">
                      <div class="footer-widget pl-2">
                          <h3>الخدمات</h3>
                          <ul class="footer-list">
                              <li>
                                  <a href="service-details.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                      أسواق المدينة
                                  </a>
                              </li>
                              <li>
                                  <a href="service-details.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                      خريطة المدينة
                                  </a>
                              </li>
                              <li>
                                  <a href="service-details.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                      شركات الصيانة
                                  </a>
                              </li>
                              <li>
                                  <a href="compare.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                      معالم المدينة
                                  </a>
                              </li>
                              <li>
                                  <a href="compare.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                       أرقام الطورائ
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>

                  <div class="col-lg-2 col-6">
                      <div class="footer-widget pl-2">
                          <h3>لينكات تهمك</h3>
                          <ul class="footer-list">
                              <li>
                                  <a href="service-details.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                      من نحن
                                  </a>
                              </li>
                              <li>
                                  <a href="service-details.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                      اتصل بنا
                                  </a>
                              </li>
                              <li>
                                  <a href="service-details.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                      شركاءنا
                                  </a>
                              </li>
                              <li>
                                  <a href="compare.html" target="_blank">
                                      <i class="fas fa-angle-double-left"></i>
                                      تقديم شكوي
                                  </a>
                              </li>

                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <div class="footer-widget">
                          <h3>النشرة الإخبارية</h3>
                          <p>
                              ما هو لوريم ايبسوم لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت
                              تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                          </p>
                          <div class="newsletter-area">
                              <form class="newsletter-form" data-toggle="validator" method="POST" novalidate="true">
                                  <input type="email" class="form-control" placeholder="ادخل الايميل الخاص بك" name="EMAIL" required="" autocomplete="off">
                                  <button class="subscribe-btn disabled" type="submit" style="pointer-events: all; cursor: pointer;">
                                      <i class="fas fa-paper-plane"></i>
                                  </button>
                                  <div id="validator-newsletter" class="form-result"></div>
                              </form>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
          <div class="copy-right-area text-center">
              <div class="copy-right-text">
                  <p>
                       حقوق النشر © 2021. جميع الحقوق محفوظة
                      <a href="http://me-me-eg.com/" target="_blank">Eman Sabry</a>
                  </p>
              </div>
          </div>
      </div>
  </footer>
  <!-- End Footer -->

  <!-- Modal Complaint-->
  <div class="modal fade d-none" id="complaintModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                 <!-- Start Make Complaint -->
                 <div class="group-register complaint">
                      <div class="row">
                          <div class="col-md-7">
                              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="complaints-form" method="POST" id="Makecomplaint">
                                  <h2>قم بكتابة شكوتك لناسعدك في حلها !</h2>
                                  <p>ما هو لوريم ايبسوم لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص</p>
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
                                              <!-- Start Entity Name Field -->
                                              <div class="form-group">
                                                  <label for="" class="control-label"> الاسم </label>
                                                  <input
                                                      type="text" name="ComplaintName"
                                                      class="form-control complaint-name"
                                                      placeholder="ادخل الاسم  ......"
                                                      required="required"
                                                      value="<?php if(isset($complaintName)){ echo $complaintName;} ?>"
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
                                              <input type="text" name="ComplaintNational"
                                                      placeholder=" ادخل الرقم القومي المكون من 14 رقم "
                                                      class="form-control complaint-national" required="required"
                                                      value="<?php if(isset($complaintNational)){ echo $complaintNational;} ?>"
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
                                              <input type="text" name="ComplaintPhone"
                                                      placeholder=" ادخل رقم هاتف  "
                                                      class="form-control complaint-phone" required="required"
                                                      value="<?php if(isset($complaintPhone)){ echo $complaintPhone;} ?>"
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
                                              <input type="text" name="ComplaintEmail"
                                                      placeholder=" ادخل البريد الالكتروني  "
                                                      class="form-control complaint-email" required="required"
                                                      value="<?php if(isset($complaintEmail)){ echo $complaintEmail;} ?>"
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
                                              <input type="text" name="ComplaintAddress"
                                                      placeholder=" ادخل العنوان  "
                                                      class="form-control complaint-address" required="required"
                                                      value="<?php if(isset($complaintAddress)){ echo $complaintAddress;} ?>"
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
                                              <textarea name="ComplaintText" placeholder=" ادخل الشكوي الخاص بك .......  " class="form-control complaint-text" required="required" oninvalid="this.setCustomValidity('لا يمكن أن يكون موضوع الشكوي  فارغًا')" oninput="this.setCustomValidity('')"><?php if(isset($complaintText)){ echo $complaintText;} ?></textarea>
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
                                  <img src="{{asset('main/images/complaint.png')}}"alt="Images">
                              </div>
                          </div>
                      </div>
                  </div>
                 <!-- End Make Complaint -->
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal Complaint-->
  <div class="modal fade" id="jopAppModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                 <!-- Start Jop App -->
                 <div class="group-register jopApp">
                      <form action="">
                          <h2>تقديم سيرتك الذاتية !</h2>
                          <p>
                              مرحباً بك عزيزنا .. إذا كنت ترغب في الحصول على وظيفة تناسب مهاراتك
                              وقدراتك فأنت في المكان المناسب ، من خلال تقديم سيرتك الذاتية إلينا سنوفر لك العديد من
                              الوظائف المتاحة لدينا والمناسبة لإمكانياتك ومهاراتك .. لا تتردد سجل سيرتك الذاتية الأن
                          </p>
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for=""> تاريخ الميلاد:</label>
                                      <input class="form-control" type="date" name="Date" id="Date" placeholder="أدخل تاريخ ميلادك">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">الاسم رباعي:</label>
                                      <input class="form-control" type="text" name="name" id="name" placeholder="أدخل اسمك الرباعي">
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">العنوان :</label>
                                      <input class="form-control" type="text" name="address" id="address" placeholder="سجل عنوانك">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">رقم هاتف أخر :</label>
                                      <input class="form-control" type="number" name="number2" id="number2" placeholder="سجل عنوانك">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                      <label for="">رقم الهاتف :</label>
                                      <input class="form-control" type="number" name="number" id="number" placeholder="اكتب رقم هاتفك">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                      <label for="">البريد الالكتروني :</label>
                                      <input class="form-control" type="email" name="email" id="email" placeholder="أدخل بريدك الألكتروني">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">وظيفتك الحاليه:</label>
                                      <input class="form-control" type="text" name="current-job" id="current-job" placeholder="أكتب وظيفتك الحاليه">
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">المهنه المتقدم لها :</label>
                                      <input class="form-control" type="text" name="advancedProfession" id="advancedProfession" placeholder="أدخل المهنه المتقدم لها">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for=""> الراتب المتوقع :</label>
                                      <input class="form-control" type="text" name="expectedSalary" id="expectedSalary" placeholder="أدخل الرتب المتوقع">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for=""> وصف الوظيفة:</label>
                                      <textarea class="form-control" name="jobDescription" id="jobDescription" placeholder="أكتب وصف للوظيفة"></textarea>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="">الدورات التدريبية :</label>
                                      <textarea class="form-control" name="Courses" id="Courses" placeholder="أكتب الدورات التي حصلت عليها"></textarea>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">الديانة:</label>
                                      <select class="form-control" name="Religion" id="Religion">
                                          <option value="0">مسلم</option>
                                          <option value="1">مسيحي</option>
                                          <option value="2">ديانه أخري</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">الحالة الاجتماعيه :</label>
                                      <select class="form-control" name="socialStatus" id="socialStatus">
                                          <option value="0">أعزب/ عزباء</option>
                                          <option value="1">متزوج/ متزوجه</option>
                                          <option value="2">مطلق/ مطلقه</option>
                                          <option value="3">أرمل/ أرمله</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">النوع : </label>
                                      <select class="form-control" name="Type" id="Type">
                                          <option value="0">ذكر</option>
                                          <option value="1">أنثي</option>
                                          <option value="2">غير ذلك</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                      <label for="">عدد سنوات الخبره : </label>
                                      <select class="form-control" name="yearsExperience" id="yearsExperience">
                                          <option value="0">بدون خبره</option>
                                          <option value="1">سنه واحره</option>
                                          <option value="2">سنتين</option>
                                          <option value="3">3 سنوات</option>
                                          <option value="4">4 سنوات</option>
                                          <option value="4">5 سنوات</option>
                                          <option value="4">6 سنوات</option>
                                          <option value="4">7 سنوات</option>
                                          <option value="4">8 سنوات</option>
                                          <option value="4">9 سنوات</option>
                                          <option value="4">10 سنوات</option>
                                          <option value="4">أكثر من 10 سنوات</option>
                                      </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                      <label for="">هل سبق لك العمل بالخارج :</label>
                                      <select class="form-control" name="Doyou" id="Doyou">
                                          <option value="0">نعم</option>
                                          <option value="1">لا</option>
                                      </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">هل تحيد قيادة السيارات؟</label>
                                      <select class="form-control" name="Drive" id="Drive">
                                          <option value="0">نعم</option>
                                          <option value="1">لا</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">هل حصلت على أي مؤهلات علمية</label>
                                      <select class="form-control" name="Qualifications" id="Qualifications">
                                          <option value="0">نعم</option>
                                          <option value="1">لا</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                      <label for="">هل لديك لغات اخرى غير لغتك الأم</label>
                                      <select class="form-control" name="Languages" id="Languages">
                                          <option value="0">نعم</option>
                                          <option value="1">لا</option>
                                      </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                      <label for="">هل لديك خبرات سابقة</label>
                                      <select class="form-control" name="Qualifications" id="Qualifications">
                                          <option value="0">نعم</option>
                                          <option value="1">لا</option>
                                      </select>
                                 </div>
                              </div>

                          </div>
                          <div class="Data">
                              <h3>رفع المستندات :</h3>

                              <label for="">السيرة الذاتية</label>
                              <div class="fileUpload" style="margin: unset;">
                                  <img src="{{asset('main/images/cloud-computing.png')}}" alt="">
                                  <input class="upload" type="file" name="Biography" id="Biography">
                              </div>
                              <span>يرجي إرفاق ملف السيرة الذاتية الخاصة بك مستوفي كافة التفاصيل وصور الشهادات بحجم لا يتجاوز 1 ميجا</span>
                          </div>
                          <div class="button">
                              <button type="submit" class="default-btn">سجل الأن</button>
                          </div>
                      </form>
                  </div>
                 <!-- End Jop App -->
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
              </div>
          </div>
      </div>
  </div>
