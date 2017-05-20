/**
 * Created by yangchunrun on 16/7/7.
 */
function isEmail(strEmail) {
    if (strEmail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
        return true;
    else
        return false;
}


function checkusername(s) {
    var patrn = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){1,19}$/;
    if (!patrn.exec(s)) return false
    return true
}


function checknickname(s) {

    var b = /^[0-9a-zA-Z\u4e00-\u9fa5_]{2,16}$/;
    if (!b.test(s)) {

        return false;
    } else {
        return true;
    }

}

function checkpwd(s) {

    var patrn = /^(\w){8,20}$/;
    if (!patrn.exec(s)) return false
    return true

}

$(function () {
    $("button.sign-up-button,#new-account-link").click(function () {

        var inst = $('[data-remodal-id=signup]').remodal();

        inst.open();

    });

    $("button.login-button,#login-link").click(function () {
        var inst = $('[data-remodal-id=signin]').remodal();

        inst.open();
    });
    var inputPWD = document.getElementById('new-account-password');
    var inputPWD_login = document.getElementById('login-account-password');
    var capital = false;
    var capitalTip = {
        elem: $(".caps-lock-warning"),
        toggle: function (s) {
            if (s) {
                this.elem.removeClass("invisible");
            } else {

                this.elem.addClass("invisible");
            }
        }
    }

    var detectCapsLock = function (event) {
        if (capital) {
            return
        }
        ;
        var e = event || window.event;
        var keyCode = e.keyCode || e.which; // 按键的keyCode
        var isShift = e.shiftKey || (keyCode == 16 ) || false; // shift键是否按住
        if (
            ((keyCode >= 65 && keyCode <= 90 ) && !isShift) // Caps Lock 打开，且没有按住shift键
            || ((keyCode >= 97 && keyCode <= 122 ) && isShift)// Caps Lock 打开，且按住shift键
        ) {
            capitalTip.toggle('block');
            capital = true
        }
        else {
            capitalTip.toggle('');
        }
    }
    inputPWD.onkeypress = detectCapsLock;
    inputPWD.onkeyup = function (event) {
        var e = event || window.event;
        if (e.keyCode == 20 && capital) {
            capitalTip.toggle();
            return false;
        }
    }

    inputPWD_login.onkeypress = detectCapsLock;
    inputPWD_login.onkeyup = function (event) {
        var e = event || window.event;
        if (e.keyCode == 20 && capital) {
            capitalTip.toggle();
            return false;
        }
    }


    $("#new-account-email").blur(function () {

        var email = $(this).val();

        var url = $(this).attr("data-ajax-url");

        if (!email) {
            return false;
        }

        if (isEmail(email)) {
            var arg = {};
            arg['email'] = email;
            arg[__crsf_name] = $("input[name='" + __crsf_name + "']").val();
            $.post(url, arg, function (d) {
                if (d.status) {
                    $("#email-validation").addClass("bad");
                    $("#email-validation").removeClass("good");
                    $("#email-validation").html('<i class="fa fa-times"></i>电子邮箱已经被注册');
                } else {
                    $("#email-validation").removeClass("bad");
                    $("#email-validation").addClass("good");
                    $("#email-validation").html('<i class="fa fa-check"></i>我们将邮件跟你确认');
                }
            }, "json");

        } else {
            $("#email-validation").addClass("bad");
            $("#email-validation").removeClass("good");
            $("#email-validation").html('<i class="fa fa-times"></i>请填写正确的电子邮箱地址');
        }

    });

    $("#new-account-username").blur(function () {

        var username = $(this).val();
        var url = $(this).attr("data-ajax-url");
        if (!username) {
            return false;
        }

        if (checkusername(username)) {
            var arg = {};
            arg['username'] = username;
            arg[__crsf_name] = $("input[name='" + __crsf_name + "']").val();
            $.post(url, arg, function (d) {
                if (d.status) {
                    $("#username-validation").addClass("bad");
                    $("#username-validation").removeClass("good");
                    $("#username-validation").html('<i class="fa fa-times"></i>用户名已经被注册');
                } else {
                    $("#username-validation").removeClass("bad");
                    $("#username-validation").addClass("good");
                    $("#username-validation").html('<i class="fa fa-check"></i>你可以用这个用户名');
                }
            }, "json");

        } else {
            $("#username-validation").addClass("bad");
            $("#username-validation").removeClass("good");
            $("#username-validation").html('<i class="fa fa-times"></i>2位以上,必须只包含字母、数字和下划线');
        }
    });


    $("#new-account-nickname").blur(function () {

        var nickname = $(this).val();

        if (!nickname) {
            return false;
        }
    });


    $("#new-account-password").blur(function () {

        var pwd = $(this).val();


        if (!pwd) {
            return false;
        }

        if (checkpwd(pwd)) {
            $("#pwd-validation").removeClass("bad");
            $("#pwd-validation").addClass("good");
            $("#pwd-validation").html('<i class="fa fa-check"></i>密码输入正确');
        } else {
            $("#pwd-validation").addClass("bad");
            $("#pwd-validation").removeClass("good");
            $("#pwd-validation").html('<i class="fa fa-times"></i>密码以字母开头，长度在8~20之间，只能包含字符、数字和下划线');
        }


    });


    $("#new-account-nickname").blur(function () {

        var nickname = $(this).val();


        if (!nickname) {
            return false;
        }

        if (checknickname(nickname)) {
            $("#nickname-validation").removeClass("bad");
            $("#nickname-validation").addClass("good");
            $("#nickname-validation").html('<i class="fa fa-check"></i>昵称正确');
        } else {
            $("#nickname-validation").addClass("bad");
            $("#nickname-validation").removeClass("good");
            $("#nickname-validation").html('<i class="fa fa-times"></i>昵称长度2~16之间,不能含特殊字符');
        }

    });


    $("#new-account-confirmation").blur(function () {

        var pwd = $("#new-account-password").val();
        var pwd_confirmation = $(this).val();

        if (!pwd_confirmation) {
            return false;
        }


        if (checkpwd(pwd)) {
            if (pwd != pwd_confirmation) {
                $("#pwdconfirmation-validation").addClass("bad");
                $("#pwdconfirmation-validation").removeClass("good");
                $("#pwdconfirmation-validation").html('<i class="fa fa-times"></i>两次密码输入不一致');
            } else {
                $("#pwdconfirmation-validation").removeClass("bad");
                $("#pwdconfirmation-validation").addClass("good");
                $("#pwdconfirmation-validation").html('<i class="fa fa-check"></i>密码输入正确');
            }


        } else {
            $("#pwdconfirmation-validation").addClass("bad");
            $("#pwdconfirmation-validation").removeClass("good");
            $("#pwdconfirmation-validation").html('<i class="fa fa-times"></i>密码以字母开头，长度在8~20之间，只能包含字符、数字和下划线');
        }


    });


    $('input').bind('input propertychange', function () {
        var email = $("#new-account-email").val();
        var username = $("#new-account-username").val();
        var pwd = $("#new-account-password").val();
        var pwd_compare = $("#new-account-confirmation").val();
        if (email && username && pwd && pwd_compare) {
            $('#signup-btn').removeAttr('disabled');
        } else {
            $('#signup-btn').attr('disabled', 'disabled');
        }

        var username = $("#login-account-name").val();
        var pwd = $("#login-account-password").val();
        if (username && pwd) {
            $('#signin-btn').removeAttr('disabled');
        } else {
            $('#signin-btn').attr('disabled', 'disabled');
        }

        var username_find_pwd = $("#username-or-email").val();


        if (username_find_pwd) {
            $('#reset-password-btn').removeAttr('disabled');
        } else {
            $('#reset-password-btn').attr('disabled', 'disabled');
        }
    });


    $("#signup-btn").click(function () {

        var success_url = $(this).attr("data-success-url");
        var $form = $('#userSignupForm');
        var formData = new FormData($form[0]);
        $(".loading-cup").fadeIn().css("display", "inline-block");
        $.ajax({
            url: $form.attr("action"),
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".loading-cup").fadeOut().css("display", "none");
                var msg = data.message;
                if (data.status) {

                    location.href = success_url;

                } else {

                    if (msg.email) {
                        $("#email-validation").addClass("bad");
                        $("#email-validation").removeClass("good");
                        $("#email-validation").html('<i class="fa fa-times"></i>' + msg.email);
                    }

                    if (msg.username) {
                        $("#username-validation").addClass("bad");
                        $("#username-validation").removeClass("good");
                        $("#username-validation").html('<i class="fa fa-times"></i>' + msg.username);
                    }

                }
            },
            error: function (msg) {
                console.log(msg);
            },
        });

    });


    $("#signin-btn").click(function () {

        var success_url = $(this).attr("data-success-url");
        var $form = $('#signinForm');
        var formData = new FormData($form[0]);
        $(".loading-cup").fadeIn().css("display", "inline-block");
        $.ajax({
            url: $form.attr("action"),
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".loading-cup").fadeOut().css("display", "none");
                var msg = data.message;
                if (data.status) {

                    location.href = success_url+"/"+data.username+"/activity";

                } else {


                    $(".signin-error").show();
                    $(".signin-error").html(data.message);

                }
            },
            error: function (msg) {
                console.log(msg);
            },
        });

    });


    $("#forgot-password-link").click(function () {
        var inst = $('[data-remodal-id=password-reset]').remodal();

        inst.open();
    });


    $("#reset-password-btn").click(function () {

        var url = $(this).attr("data-url");

        var username = $("#username-or-email").val();

        $(".loading-cup").fadeIn().css("display", "inline-block");
        var arg = {};
        arg['username'] = username;
        arg[__crsf_name] = $("input[name='" + __crsf_name + "']").val();

        $.post(url, arg, function (d) {
            $("#reset-password-modal-alert").show();
            $(".loading-cup").fadeOut().css("display", "none");
            if (d.status) {

                $("#reset-password-modal-alert").fadeIn();
                $("#reset-password-modal-alert").addClass("alert-success");
                $("#reset-password-modal-alert").html('你的账户 <b>'+d.email+'</b> 存在，你将马上收到一封电子邮件，告诉你如何重置密码。');


            } else {

                $("#reset-password-modal-alert").fadeIn();
                $("#reset-password-modal-alert").addClass("alert-error");
                $("#reset-password-modal-alert").html("重置密码错误,您的账号不存在或者其他错误");

            }

        });
    });


});