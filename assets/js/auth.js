/**
 * Created by Rent Direct
 */

$(document).ready(function(){

    /* Register a new landlord */
    $('#register').click(function(){

        // Clear off any previous validation classes
        $('#email_group').removeClass('has-error');
        $('#password_group').removeClass('has-error');
        $('#confirm_password_group').removeClass('has-error');
        $('#t_c_group').removeClass('has-error');

        // Get form data
        var email = $('#register_email').val();
        var password = $('#register_password').val();
        var confirm_password = $('#register_confirm_password').val();
        var t_c = $('#t_c').is(':checked');
        var user_type = $('#user_type').val();

        // Validate, all fields are required
        var errors = "";
        var is_errors = false;
        var valid_email = validateEmail(email);

        if (!email) {
            errors += "Email address is required<br />";
            is_errors = true;
            $('#email_group').addClass('has-error');
        }

        if (!valid_email) {
            errors += "Email address must be valid, e.g. john.doe@somewhere.com<br />";
            is_errors = true;
            $('#email_group').addClass('has-error');
        }

        if (!password || password.length < 8) {
            errors += "Password is required and be at least eight characters long<br />";
            is_errors = true;
            $('#password_group').addClass('has_error');
        }

        if (password != confirm_password) {
            errors += "Password and confirm password do not match<br />";
            is_errors = true;
            $('#confirm_password_group').addClass('has_error');
        }

        if (!t_c) {
            errors += "Please agree to the terms and conditions";
            is_errors = true;
            $('#t_c_group').addClass('has_error');
        }

        if (is_errors) {

            // Show the errors in the notification bar
            var error_message = "Please check the following:" + errors;
            showNotification({
                message: error_message,
                type: "error"
            });
        } else {

            $.post('/ajax/add_user', {type:user_type, email:email, password:password, confirm_password:confirm_password}, function(data){
                if (data.response == 'SUCCESS') {

                    // Registered and logged in, check if there is a property id and redirect to the property page if so
                    if (data.property_id != 'NONE') {
                        location.href = "/properties/view/" + data.property_id;
                    } else {
                        location.href = "/";
                    }
                } else {

                    // Probably a duplicate email address
                    if (data.reason) {
                        bootbox.dialog({
                            message: data.reason,
                            title: "Account already exists"

                        });
                    }
                }
            },'json');
        }
    });

    /* Handle user login button */
    $('.login_button').click(function(){
        do_login();

    });

    $(document).keypress(function(e) {
        if(e.which == 13) {
            if($("#login_email").is(":focus") || $("#login_password").is(":focus")){
                do_login();
            }
        }
    });


    /* Handle user logout */
    $('#logout').click(function(){
        $.post('/ajax/logout', {logout:'logout'}, function(data){
            if (data.response == 'SUCCESS') {
                location.href= "/";
            }

        },'json');
    });

    function do_login() {
        // Make sure they've filled in the fields
        var is_errors = false;
        var errors = "";
        var login_email = $('#login_email').val();
        var login_password = $('#login_password').val();
        var property_id = $('#property_id').val();

        if (!login_email) {
            is_errors = true;
            errors += "Email address is required<br />";
        }

        if (!login_password) {
            is_errors = true;
            errors += "Password is required<br />";
        }

        if (is_errors) {

            // Show the errors in the notification bar
            var error_message = "<h3>Please check the following:</h3>" + errors;
            $('#notification_bar').html(error_message);
            $('#notification_bar').slideDown(250);
        } else {

            // Log 'em in
            $.post('/ajax/login', {email:login_email, password:login_password, property_id:property_id}, function(data){
                if (data.response == 'SUCCESS') {

                    if (data.is_advertiser == 'YES') {
                        alert('advertiser');
                    }
                    // Logged in, check if they are an admin user and redirect to the admin panel if so
                    if (data.is_admin == 'YES') {

                        location.href = "/admin";
                    } else

                    // Check if there is a property id and redirect to the property page if so
                    if (data.property_id != 'NONE') {
                        location.href = "/properties/view/" + data.property_id;
                    } else {
                        location.href = "/properties";
                    }

                } else {

                    // Show the errors in the notification bar
                    showNotification({
                        message: 'Your username or password were not recognised. <a href="#">Forgotten your password?</a>',
                        type: "error"
                    });
                }
            },'json');
        }
    }

});

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}