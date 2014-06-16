$("#register_form").validate({
    errorClass: "errorMsg",
    rules: {
        reg_email: {
            required: true,
            email: true
        },
        reg_password: {
            required: true,
            minlength: 6
        },
        reg_Cpassword: {
            required: true,
            equalTo: "#reg_password"
        }
    },
    messages: {
        reg_email: {
            required: "Please enter your Email.",
            email: "Please enter your Email in the right format"
        },
        reg_password: {
            required: "Please enter your password.",
            minlength: $.format("Please enter password of minimum {0} characters.")
        },
        reg_Cpassword: {
            required: "Please enter confirm password.",
            equalTo: "Confirm password does not match."
        }
    },
    submitHandler: function() {
        console.log("No validation errors! : "+window.emailValid);
         emailCheckAJAX();
        // register(window.emailValid); 


    }
});

$('#login_form').validate({
    errorClass: "errorMsg",
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        }        
    },
    messages: {
        email: {
            required: "Please enter your Email.",
            email: "Please enter your Email in the right format"
        },
        password: {
            required: "Please enter your password."
        }
    },
    submitHandler: function() {
      login();
    }
});


    $('#form_add').validate({
        errorClass: "errorMsg",
        rules: {
            fridge_food_name: {
                required: true
            },
            fridge_food_expiary: {
                required: true
            }        
        },
        messages: {
            fridge_food_name: {
                required: "Please enter food name."
            },
            fridge_food_expiary: {
                required: "Please enter expiry date."
            }
        },
        submitHandler: function() {
          //

        }
    });

