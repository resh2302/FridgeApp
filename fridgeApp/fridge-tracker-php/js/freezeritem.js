$(".freezertext").focusout(function(){
   itemname = $(this).val();
   id = $(this).prev('.itemrad').val();
   console.log(itemname + " " + id);

        $.ajax({
            type: "POST",
            url: "updategroceryFreezer.php",
            data: {ItemName :itemname, ID :id} 
        })
        .done(function(response) {
            console.log(response);
            if(response == "success")
            {
                console.log(" here : "+response);
 window.location.href="groceryFreezer.php";
            }
            else{
               console.log("Sorry could not update "+itemname+". Please try again later");
                window.location.href="groceryfreezer.php";
            }
        });
});

$(".btnDel").click(function(){
   id = $(this).prevAll('.itemrad').val();


        $.ajax({
            type: "POST",
            url: "deleteFreezergrocery.php",
            data: { ID :id} 
        })
        .done(function(response) {
            console.log(response);
            if(response == "success")
            {
                console.log(" here : "+response);
                window.location.href="groceryFreezer.php";
            }
            else{
               console.log("Sorry could not delete");
                window.location.href="groceryFreezer.php";
            }
        });
});


