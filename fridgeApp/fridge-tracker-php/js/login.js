function login(){

    email = $("#email").val();
    password = $("#password").val();

    console.log(email);
    console.log(password);

    $.ajax({
      type: "POST",
      url: "doLogin.php",
      data: { email: email, password: password }
    })
      .done(function( msg ) { 
        console.log("msg is : "+msg);
        if (msg == "success") {
            console.log("success");
            window.location.href="choice.php";
        }        
        else {
            console.log("fail");
            alert ("Incorrect username or password. Please try again!");
        }
      })
      .fail(function() {  // display error message on screen - Reshma 
          alert ("Fail to login!");
      });

    return false;
}