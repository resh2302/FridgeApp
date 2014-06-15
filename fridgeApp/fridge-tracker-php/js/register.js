// window.emailValid = 1;
// $('#signUpBtn').click(function(e) {
//     e.preventDefault();
//     emailCheckAJAX();
//     console.log("here here here");
//     register(window.emailValid);
// });

// $('#reg_email').focusout(function() { // maybe call focus in first
//     emailCheckAJAX();
// });


function emailCheckAJAX() {
    email = $("#reg_email").val(); //email = variable

    $.ajax({
        type: "POST",
        url: "checkEmail.php",
        data: {email: email} // email => same as name email => variable
    })
    .done(function(response) {
        console.log(response);
        if (response == "repeat")
        {
            $('#error').text("This email is already in use.");
//            $("#register_email").focus();
            window.emailValid = 0;
        }
        else
        {
            $('#error').text("");
            window.emailValid = 1;
            register(window.emailValid);
        }
    })
    .fail(function() {
        console.log("failure in email check - ajax");
    });
}


function register(emailCheck) { // checklist_id
    email = $("#reg_email").val();
    password = $("#reg_password").val();
    console.log("email check ajax register : " + emailCheck);
    if (emailCheck) {
        $.ajax({
            type: "POST",
            url: "doRegister.php",
            data: {
                email: email,
                password: password,
            }
        }).done(function(response) {
            console.log("back from php response : "+response);
            
                if (response == 1)
                {
                    //window.location.href = 'autoLogin.php?action='+actionfor+'&email='+email;
                    window.location.href = 'login.php';
                    
                }
                else
                {
                    console.log("registration failed");
                    $("#registration_status").text("Sorry we could not register you. Please try again later!");
                }
                $("#registration_status").fadeToggle(4000, "linear").fadeToggle(3000, "linear");
            
        })
                .fail(function() {
                    console.log("could not register");
                });
    }
    else {
        console.log("Email not valid");
        $("#error").text("This email is in use. Please use another email!");
        $("#error").fadeToggle(4000, "linear").fadeToggle(3000, "linear");

    }
    return false;
}