$('.delete').click(function(e){
	e.preventDefault();
	fridgeFoodID = $(this).next().next('input.ffid').val();
	
	$.ajax({
        type: "POST",
        url: ".php",
        data: {ID: fridgeFoodID} 
    })
    .done(function(response) {

    });

})