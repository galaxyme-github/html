"use strict";

(function ($) {
    /*==================================================================
    [ Validate after type ]*/
    $('.validate-input .input100').each(function () {
        $(this).on('blur', function () {
            if (validate(this) == false) {
                showValidate(this);
            } else {
                $(this).parent().addClass('true-validate');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
 
    // ==================== Sign up Step 1 Validation ==================== //
    $("#continue_1").on("click", function (e) {
        e.preventDefault();
        var $stepForm = $("#signup-step-form-1");
        var check = true;

        $stepForm.find('input').each(function () {
            if (signupValidation(this) == false) {
                setInvalidate(this);
                check = false;
            } else {
                setValidate(this);
            }
        });

        if (reCaptchaValidation() == false) {
            check = false;
        }

        if (check == false) {
            return;
        } else {
            nextStep(2);
        }
    });

    var $stepForm_1 = $("#signup-step-form-1");
    var pwdMatch = 0;
    $stepForm_1.find('input').on('input', function() {
        if (signupValidation(this) ==  false) {
            setInvalidate(this);
        } else {
            setValidate(this);
        }

        if ($(this).attr('type') == 'password' && $(this).attr('name') == 'password') {
            let $strengthAlertWrap = $('#password_strength_check');
            let alert = '';
            $(this).siblings(".password-strength").removeClass('d-none');
            if (checkPasswordStrength(this) == 0) {
                $strengthAlertWrap.removeClass();
                $strengthAlertWrap.addClass('short');
                alert = 'Too Short';
            } else if (checkPasswordStrength(this) < 2) {
                $strengthAlertWrap.removeClass()
                $strengthAlertWrap.addClass('weak')
                alert = 'Weak'
            } else if (checkPasswordStrength(this) == 2) {
                $strengthAlertWrap.removeClass()
                $strengthAlertWrap.addClass('good')
                alert = 'Good'
            } else {
                $strengthAlertWrap.removeClass()
                $strengthAlertWrap.addClass('strong')
                alert = 'Strong'
            }

            $("#check_result").html(alert);
    
            // sync confirm pasword
            if (pwdMatch == 1) {
                let $rePwdNode = $('input[id=rePassword]');
                if ($(this).val() == $('input[id=rePassword]').val()) {
                    $rePwdNode.siblings(".with-errors").addClass('d-none');
                    setValidate($rePwdNode);
                } else {
                    setInvalidate($rePwdNode);
                    $rePwdNode.siblings(".with-errors").removeClass('d-none');
                }
            }
        }

        if ($(this).attr('type') == 'password' && $(this).attr('id') == 'rePassword') {
            pwdMatch = 1;
            if ($(this).val() != $('input[name=password]').val()) {
                setInvalidate(this);
                $(this).siblings(".with-errors").removeClass('d-none');
            } else {
                $(this).siblings(".with-errors").addClass('d-none');
                setValidate(this);
            }
        }
    });

    function signupValidation(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (!reg.test($(input).val().trim())) {
                return false;
            }
        } else if ($(input).attr('type') == 'password' && $(input).attr('name') == 'password') {
            if (checkPasswordStrength(input) == 0) {
                return false;
            } 
        } else if ($(input).attr('type') == 'password' && $(input).attr('name') == 'rePassword') {
            if ($(input).val() != $('input[name=password]').val() || $(input).val().trim() == '') {
                return false;
            }
        } else if ($(input).attr('name') == 'address_2' || $(input).attr('name') == 'company') {
            return true;
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function checkPasswordStrength(input) {
        var strength = 0;
        if ($(input).val().length >= 5) strength += 1;
        // If password contains both lower and uppercase characters, increase strength value.
        if ($(input).val().match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
        // If it has numbers and characters, increase strength value.
        if ($(input).val().match(/([a-zA-Z])/) && $(input).val().match(/([0-9])/)) strength += 1;
        // If it has one special character, increase strength value.
        if ($(input).val().match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
        // If it has two special characters, increase strength value.
        if ($(input).val().match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
        // Calculated strength value, we can return messages
        
        return strength;
    }

    function nextStep(nextStep) {
        var prevStep = nextStep - 1;
        $("#signup-step-form-" + prevStep).addClass('d-none');
        $("#signup-step-form-" + nextStep).removeClass('d-none');
    }

    function reCaptchaValidation() {
        var token = $("input[name=g-recaptcha-response").val();
        if (token.length > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Validate *[Form submit]
    var $frm = $(".signup-validate-form");

    $frm.on('submit', function (e) {
        var check = true;

        $frm.find('input').each(function () {
            if (signupValidation(this) == false) {
                setInvalidate(this);
                check = false;
            } else {
                setValidate(this);
            }
        });

        if (isAgreedPolicyTerms() == false) {
            check = false;
        }

        if (check == false) {
            e.preventDefault();
        } else {
            return true;
        }
    });

    function isAgreedPolicyTerms () {
        if ($("#checkbox").prop("checked") == false) {
            $("#checkbox").siblings(".with-errors").removeClass("d-none");
            return false;
        }
    }

    var $stepForm_2 = $("#signup-step-form-2");
    $stepForm_2.find('input').on('input', function() {
        if (signupValidation(this) ==  false) {
            setInvalidate(this);
        } else {
            setValidate(this);
        }
    });
    $("#checkbox").on('change', function() {
        if ($("#checkbox").prop('checked')) {
            $("#checkbox").siblings(".with-errors").addClass("d-none");
        } else {
            $("#checkbox").siblings(".with-errors").removeClass("d-none");
        }
    })
    // =========================== End Sign up Form-validation ====================== //

    // =========================== Sign up Form Validatoin =========================//
    var $signinFrm = $(".signin-validate-form");
    $signinFrm.find('input').on('input', function() {
        if (signinValidation(this) ==  false) {
            setInvalidate(this);
        } else {
            setValidate(this);
        }
    });

    $signinFrm.on('submit', function (e) {
        var check = true;

        $signinFrm.find('input').each(function () {
            if (signinValidation(this) == false) {
                setInvalidate(this);
                check = false;
            } else {
                setValidate(this);
            }
        });

        if (check == false) {
            e.preventDefault();
        } else {
            return true;
        }
    });

    function signinValidation(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (!reg.test($(input).val().trim())) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }
    // =========================== End Sign up Form-validation =====================//
    function setInvalidate(input) {
        $(input).removeClass('is-valid').addClass("is-invalid");
    }

    function setValidate(input) {
        $(input).removeClass('is-invalid').addClass("is-valid");
    }
})(jQuery);