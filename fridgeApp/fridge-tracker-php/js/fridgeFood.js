$('.frd_item_delete').click(function(e){
	e.preventDefault();
    mac = $('#mac').val();
    console.log("mac : "+mac);
    name = $(this).prev('input.ffName').val();
    del = confirm("Are you sure you want to remove "+name+" from your fridge? ");
    fid = $('#FID').val(); 
    if(del)
    {
        fridgeFoodID = $(this).next().next('input.ffid').val();
    
        $.ajax({
            type: "POST",
            url: "editFridge.php",
            data: {ID: fridgeFoodID, action: "delete", mac: mac} 
        })
        .done(function(response) {
            console.log(response);
            if(response == "success")
            {
                console.log(" here : "+response);
                window.location.href = 'myRefrigerator.php?id='+fid+'&mac='+mac;
            }
            else{
                alert("Sorry could not delete "+name+". Please try again later");
            }
        });
    }
    $(this).parent('.editSection').hide();
});
