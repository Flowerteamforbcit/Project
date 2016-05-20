/*<![CDATA[*/
$(document).ready(function () {
    total = 0;

    var qtyCheckMessage = "";
    // FOR PUTTING OBJECTS INTO HTML5 WEB STORAGE - ADD METHODS TO THE STORAGE OBJECT
    // http://stackoverflow.com/questions/2010892/storing-objects-in-html5-localstorage
    Storage.prototype.setObject = function (key, value) {
        this.setItem(key, JSON.stringify(value));
    }

    Storage.prototype.getObject = function (key) {
        var value = this.getItem(key);
        return value && JSON.parse(value);
    }

    // LOAD ALL PRODUCTS
    function loadProducts() {
        $.ajax({
            url: "./products.php",
            type: "GET",
            dataType: 'html',
            success: function (returnedData) {
                //console.log("cart checkout response: ", returnedData);
                $("#productslist").html(returnedData);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });


    }

    loadProducts();

//    function loadProductsForHome() {
//        $.ajax({
//            url: "./loadproducts.php",
//            type: "GET",
//            dataType: 'html',
//            success: function (returnedData) {
//                console.log("cart checkout response: ", returnedData);
//                $("#productslistforhome").html(returnedData);
//
//            },
//            error: function (jqXHR, textStatus, errorThrown) {
//                console.log(jqXHR.statusText, textStatus);
//            }
//        });
//    }
//
//    loadProductsForHome();
    $("body").click(function() {
        $("#results").css('display', 'none');
    });
    
    $( ".search" ).submit(function( event ) {
        var form =   $(".search").serializeArray();
        $('#results').css('display', 'none');
        console.log(form[0].value);
        $.ajax({
            url: "./loadproducts.php",
            type: "POST",
            
            data: {form: form[0].value},
            success: function (returnedData) {
                $("#productslistforhome").html(returnedData);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });
      event.preventDefault();
    });
    
    $('.search').click(function() {
        if ($("#results").css('display') == 'block') {
            $("#results").css('display', 'none');
        } else {
            $("#results").css('display', 'block');
        }
    });
    
    $('.search').keypress(function( event ) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $("#results").css('display', 'none');
        }
        $("#results").css('display', 'block');
    });
    

    function loadProductsForAll() {
        $.ajax({
            url: "./loadproducts.php",
            type: "POST",
            dataType: 'html',
            success: function (returnedData) {
                //console.log("cart checkout response: ", returnedData);
                $("#commentlist").html(returnedData);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });
    }

    loadProductsForAll();
	
	
	
});



