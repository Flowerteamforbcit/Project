$(document).ready(function(){

	//when user clicked sort by address
	$("#Address").click(function(){
		var orderby = "storeAddress";
		
		$("#results").css("display", "none");
        var form =   $(".search").serializeArray();
        console.log(form[0].value);
        $.ajax({
            url: "./sortproducts.php",
            type: "POST",
            data: {form: form[0].value, sortby:orderby},
            success: function (returnedData) {
                //console.log("cart checkout response: ", returnedData);
                $("#productslistforhome").html(returnedData);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });
        event.preventDefault();
    });
	
	$("#Price").click(function(){
		var orderby = "price";
		
		$("#results").css("display", "none");
        var form =   $(".search").serializeArray();
        console.log(form[0].value);
        $.ajax({
            url: "./sortproducts.php",
            type: "POST",
            data: {form: form[0].value, sortby:orderby},
            success: function (returnedData) {
                //console.log("cart checkout response: ", returnedData);
                $("#productslistforhome").html(returnedData);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });
        event.preventDefault();
    });
	
    $("#Delivery").click(function(){
        var orderby = "price";
        
        $("#results").css("display", "none");
        var form =   $(".search").serializeArray();
        console.log(form[0].value);
        $.ajax({
            url: "./sortproductsByDelivery.php",
            type: "POST",
            data: {form: form[0].value, Delivery:1},
            success: function (returnedData) {
                //console.log("cart checkout response: ", returnedData);
                $("#productslistforhome").html(returnedData);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });
        event.preventDefault();
    });
    
    
    
});
