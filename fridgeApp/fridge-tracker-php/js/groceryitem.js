$(".itemtext").focusout(function(){
   itemname = $(this).val();
   id = $(this).prev('.itemrad').val();
   console.log(itemname + " " + id);

        $.ajax({
            type: "POST",
            url: "updategroceryFridge.php",
            data: {ItemName :itemname, ID :id} 
        })
        .done(function(response) {
            console.log(response);
            if(response == "success")
            {
                console.log(" here : "+response);
 window.location.href="grocerylist.php";
            }
            else{
               console.log("Sorry could not update "+itemname+". Please try again later");
                window.location.href="grocerylist.php";
            }
        });
});

$(".btnDel").click(function(){
   id = $(this).prevAll('.itemrad').val();


        $.ajax({
            type: "POST",
            url: "deletegroceryFridge.php",
            data: { ID :id} 
        })
        .done(function(response) {
            console.log(response);
            if(response == "success")
            {
                console.log(" here : "+response);
                window.location.href="grocerylist.php";
            }
            else{
               console.log("Sorry could not delete");
                window.location.href="grocerylist.php";
            }
        });
});
