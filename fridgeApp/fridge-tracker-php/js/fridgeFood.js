$('.frd_item_delete').click(function(e){
	e.preventDefault();

    name = $(this).prev('input.ffName').val();
    del = confirm("Are you sure you want to remove "+name+" from your fridge? ");
    if(del)
    {
        fridgeFoodID = $(this).next().next('input.ffid').val();
    
        $.ajax({
            type: "POST",
            url: "editFridge.php",
            data: {ID: fridgeFoodID, action: "delete"} 
        })
        .done(function(response) {
            console.log(response);
            if(response == "success")
            {
                console.log(" here : "+response);
                $("#fridge_body").load('myRefrigerator.php');
            }
            else{
                alert("Sorry could not delete "+name+". Please try again later");
            }
        });
    }
    $(this).parent('.editSection').hide();
});
