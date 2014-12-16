function validate_login() {
    var email = $('#signin_email').val().trim();
    var pass = $('#signin_password').val().trim();
    var re = /\S+@\S+\.\S+/;
    var test = re.test(email);
    if (email != '' && pass != '') {
        if (test == false) {
            $('#signin_error').text('Invalid email address');
            return false;
        } else {
            $.ajax({
                type: 'POST',
                url: "login/userdata",
                cache: false,
                data: {
                    Email: email,
                    Password: pass
                },
                success: function(data) {
                    //alert(data);
                    try {
                        if (data == '1') {
                            $('#signin_error').text("Login Successful");
                            //alert('hiii');
                            setTimeout(function() {
                                //location.reload();
                            }, 1000);
                            window.location = 'home';

                        } else if (data == '0') {
                            throw "Wrong Password Filled";
                        } else {
                            throw "User does not exists";
                        }
                    } catch (msg) {
                        $('#signin_error').text(msg);
                    }
                },
                error: function(e) {
                    alert('Error while request..' + e);
                }
            });
        }
    } else if (email == '')
    {
        $('#signin_error').text('please fill email text field');
        return false;
    } else if (pass == '') {
        $('#signin_error').text('password field can not be empty');
        return false;
    }
}
