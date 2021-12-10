$(function(){

    'use strict';

              // Validate Form Login       
              var userError = true , passError = true;
              $('.username').blur(function(){
                  if($(this).val().length < 4 || $(this).val() === ''){   // Show Error
                      $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                      // .end().find('.asterisx').fadeIn(200);
                      $(this).focus();
                      userError= true;
                  }else{      //No Error
                      $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                      userError = false;
                  }
              });
              $('.password-login').blur(function(){
                  if($(this).val() === ''){   // Show Error
                      $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                      $(this).focus();
                      passError= true;
                  }else{      //No Error
                      $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                      passError = false;
                  }
              });

              // Submit Form Validattion Login
              $('.form-login').submit(function(e){
                if(userError === true || passError === true ){
                    e.preventDefault();
                    $('.username , .password-login').blur();
                }
              });


                          // Validate Form Members       
            var nameMemberError = true , passwordError = true 
            emailMemberError = true , govMemberError = true ,
            cityMemberError = true , regionMemberError = true ,
            bulidMemberError = true , roleMemberError = true ,
            apartMemberError = true , phoneMemberError = true ;
            recordMemberError = true ;
        $('.name-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                nameMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                nameMemberError = false;
            }
        });
        $('.password-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                passwordError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                passwordError = false;
            }
        });
        $('.email-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                emailMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                emailMemberError = false;
            }
        });
        $('.gov-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                govMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                govMemberError = false;
            }
        });
        $('.city-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                cityMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                cityMemberError = false;
            }
        });
        $('.region-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                regionMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                regionMemberError = false;
            }
        });
        $('.bulid-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                bulidMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                bulidMemberError = false;
            }
        });
        $('.role-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                roleMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                roleMemberError = false;
            }
        });
        $('.apartment-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                apartMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                apartMemberError = false;
            }
        });
        $('.phone-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                phoneMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                phoneMemberError = false;
            }
        });
        $('.record-member').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                recordMemberError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                recordMemberError = false;
            }
        });
        // Submit Form Validattion Emergency Numbers
        $('.form-signup').submit(function(e){
            if(
                nameMemberError === true || 
                passwordError === true || 
                emailMemberError === true || 
                govMemberError === true || 
                cityMemberError === true || 
                regionMemberError === true || 
                bulidMemberError === true || 
                roleMemberError === true || 
                apartMemberError === true || 
                phoneMemberError === true || 
                recordMemberError === true){
                e.preventDefault();
                $('.name-member , .password-member , .email-member , .gov-member , .city-member , .region-member , .bulid-member , .role-member , .apartment-member , .phone-member , .record-member').blur();
            }
        });



        // Validate Form Static Complaints       
        var nameComplaintError = true , nationalError = true , emailComplaintError = true ,
        phoneComplaintError = true , addressComplaintError = true , complaintTextError = true;
        $('.complaint-name').blur(function(){
            if($(this).val().length < 4 || $(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                // .end().find('.asterisx').fadeIn(200);
                $(this).focus();
                nameComplaintError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                nameComplaintError = false;
            }
        });
        $('.complaint-national').blur(function(){
            if($(this).val() === ''){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                nationalError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                nationalError = false;
            }
        });
        $('.complaint-phone').blur(function(){
            if($(this).val() === '' ){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                phoneComplaintError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                phoneComplaintError = false;
            }
        });
        $('.complaint-email').blur(function(){
            if($(this).val() === '' ){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                emailComplaintError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                emailComplaintError = false;
            }
        });
        $('.complaint-address').blur(function(){
            if($(this).val() === '' ){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                addressComplaintError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                addressComplaintError = false;
            }
        });
        $('.complaint-text').blur(function(){
            if($(this).val() === '' ){   // Show Error
                $(this).css('border' , '1px solid #F00').parent().find('.custom-alert').fadeIn(200);
                $(this).focus();
                complaintTextError= true;
            }else{      //No Error
                $(this).css('border' , '1px solid #080').parent().find('.custom-alert').fadeOut(200);
                complaintTextError = false;
            }
        });

        // Submit Form Validattion Static Complaints
        $('.complaints-form').submit(function(e){
            if(nameComplaintError === true || nationalError === true || phoneComplaintError === true || emailComplaintError === true || addressComplaintError === true || complaintTextError === true){
                e.preventDefault();
                $('.complaint-name , .complaint-national , .complaint-phone , .complaint-email , .complaint-address , .complaint-text').blur();
            }
        });
      
   
});