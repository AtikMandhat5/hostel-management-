
$(document).ready(function () {

    $('.login_form').validate(
            {
                rules:
                        {
                            email: {
                                required: true,
                            },
                            password: {
                                required: true,
                            }
                        },
                messages: {
                    email: {
                        required: "Please enter email"
                    },
                    password: {
                        required: "Please enter password"
                    }
                },
                highlight: function (element)
                {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element)
                {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function (error, element)
                {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function ()
                {
                    var email = $("#email").val();
                    var password = $("#password").val();

//                    alert('email = ' + email + ' password = ' + password);
//                    return;

                    $.ajax(
                            {
                                type: "POST",
                                url: base_url + 'welcome/auth_user',
                                data: {
                                    'email': email,
                                    'password': password
                                },
                                // contentType: false,
                                //processData: false,
                                success: function (data)
                                {
//                                    $('#loading').hide();
                                    data = data.trim();
                                    if (data === 'success') {
                                        window.location.href = base_url + 'dashboard';
                                    } else {
                                        $('.error_div').show();
                                    }
                                }
                            });
                }
            });


});