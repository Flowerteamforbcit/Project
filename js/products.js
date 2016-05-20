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
                console.log("cart checkout response: ", returnedData);
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
                $("#productslistforhome").html(returnedData);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });
    }

    loadProductsForAll();
    // SESSION STORAGE GET ITEMS IF THEY ALREADY EXIST IN SESSION STORAGE
    function loadShoppingCartItems() {

        var cartData = sessionStorage.getObject('autosave');

        // if nothing added leave function
        if (cartData == null) {
            return;
        }
        var cartDataItems = cartData['items'];
        var shoppingCartList = $("#shoppingCart");


        for (var i = 0; i < cartDataItems.length; i++) {
            var item = cartDataItems[i];
            // sku, qty, date
            var sku = item['sku'];
            var qty = item['qty'];
            var date = item['date'];
            var price = item['price'];
            var desc = item['desc'];
            var subtotal = parseFloat(Math.round((qty * price) * 100) / 100).toFixed(2);

            var item = "<li data-item-sku='" + sku + "' data-item-qty='" + qty + "' data-item-date='"
                + date + "'>" + desc + " " + qty + " x $" + price + " = " + subtotal
                + " <input type='button' data-remove-button='remove' value='X'/></li>";
            shoppingCartList.append(item);


        }
        console.log('cart items array, added', cartDataItems);
    }

    loadShoppingCartItems();

});


$('#productslist').on('click', 'input[data-sku-add]', function () {
    // console.log(this.getAttribute("data-sku-add"));


    $('#startCart').click();

    // get the sku
    var sku = this.getAttribute("data-sku-add");
    var qty = $("input[data-sku-qty='" + sku + "']").val();
    var price = $("td[data-sku-price='" + sku + "']").text();
    var desc = $("td[data-sku-desc='" + sku + "']").text();
    var subtotal = parseFloat(Math.round((qty * price) * 100) / 100).toFixed(2);
    console.log(desc, "quantity", qty, "price", price);

    var shoppingCartList = $("#shoppingCart");

    // Check if DB has enough Quantity
    console.log("checking DB...");
    $.ajax({
        url: "./checkQuantity.php?check=" + sku,
        type: "GET",
        dataType: "json",
        success: function (returnedData) {
            console.log(returnedData);

            if (returnedData.quantity < qty) {
                qtyCheckMessage = "No more quantity!!"
                $("#DBchecking").html(qtyCheckMessage);
                alert("No more quantity!!");
            } else {
                var checking = sessionStorage.getObject('autosave');
                //console.log(checking.items[0].sku);
                var hasItem = false;
                if (checking.items != null) {
                    for (var i = 0; i < checking.items.length; i++) {

                        if (checking.items[i].sku == sku) {
                            hasItem = true;
                            break;
                        }

                    }

                }
                if (!Boolean(hasItem)) {
                    // ALTERED FOR WEB STORAGE
                    qtyCheckMessage = '';
                    $("#DBchecking").html(qtyCheckMessage);

                    var aDate = new Date();
                    var item = "<li data-item-sku='" + sku + "' data-item-qty='" + qty + "' data-item-date='"
                        + aDate.getTime() + "'>" + desc + " " + qty + " x $" + price + " = " + subtotal
                        + " <input type='button' data-remove-button='remove' value='X'/></li>";
                    shoppingCartList.append(item);


                    // SESSION STORAGE - SAVE SKU AND QTY AS AN OBJECT IN THE
                    // ARRAY INSIDE OF THE AUTOSAVE OBJECT
                    var cartData = sessionStorage.getObject('autosave');
                    if (cartData == null) {
                        return;
                    }
                    var item = {'sku': sku, 'qty': qty, date: aDate.getTime(), 'desc': desc, 'price': price};
                    total += parseFloat(subtotal);
                    cartData['items'].push(item);
                    // clobber the old value
                    sessionStorage.setObject('autosave', cartData);

                    //get the total
         
                    $("#totalPrice").html(total);
                } else {
                    alert("Only one kind per Object is allowed");
                }


            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText, textStatus);
        }

    });
});


$('#productslistforhome').on('click', 'input[data-sku-add]', function () {
    //console.log(this.getAttribute("data-sku-add"));

    $('#startCart').click();

    // get the sku
    var sku = this.getAttribute("data-sku-add");
    var qty = 1;
    var price = $("strong[data-sku-price='" + sku + "']").text();
    var desc = $("p[data-sku-desc='" + sku + "']").text();
    var subtotal = parseFloat(Math.round((qty * price) * 100) / 100).toFixed(2);
    console.log(desc, "quantity", qty, "price", price);

    var shoppingCartList = $("#shoppingCart");


    // ALTERED FOR WEB STORAGE
    var aDate = new Date();
    var item = "<li data-item-sku='" + sku + "' data-item-qty='" + qty + "' data-item-date='"
        + aDate.getTime() + "'>" + desc + " " + qty + " x $" + price + " = " + subtotal
        + " <input type='button' data-remove-button='remove' value='X'/></li>";
    shoppingCartList.append(item);


    // SESSION STORAGE - SAVE SKU AND QTY AS AN OBJECT IN THE
    // ARRAY INSIDE OF THE AUTOSAVE OBJECT
    var cartData = sessionStorage.getObject('autosave');
    if (cartData == null) {
        return;
    }
    var item = {'sku': sku, 'qty': qty, date: aDate.getTime(), 'desc': desc, 'price': price};
    cartData['items'].push(item);
    // clobber the old value
    sessionStorage.setObject('autosave', cartData);


});

// remove items from the cart
$("#shoppingCart").on("click", "input", function () {
    // https://api.jquery.com/closest/


    // WEB STORAGE REMOVE
    var thisInputSKU = this.parentNode.getAttribute('data-item-sku');
    var thisInputQty = this.parentNode.getAttribute('data-item-qty');
    var thisInputDate = this.parentNode.getAttribute('data-item-date');

    var cartData = sessionStorage.getObject('autosave');
    if (cartData == null) {
        return;
    }
    var cartDataItems = cartData['items'];
    for (var i = 0; i < cartDataItems.length; i++) {
        var item = cartDataItems[i];
        // get the item based on the sku, qty, and date
        if (item['sku'] == thisInputSKU && item['date'] == thisInputDate) {
            total -= parseFloat((Math.round((parseFloat(cartData.items[i]['qty']) * parseFloat(cartData.items[i]['price'])) * 100) / 100).toFixed(2))
            
            // remove from web storage
            cartDataItems.splice(i, 1);

        }
    }
     $("#totalPrice").html(total);

    cartData['items'] = cartDataItems;
    console.log('cart data stuff', cartData);
    // clobber the old value
    sessionStorage.setObject('autosave', cartData);

    this.closest("li").remove();

});


// start the cart
$("#startCart").click(function () {
    qtyCheckMessage = "";
    $("#DBchecking").html(qtyCheckMessage);

    console.log("Start cart.");
    $.ajax({
        url: "./shoppingcart.php",
        type: "POST",
        dataType: 'json',
        data: {action: "startcart"},
        success: function (returnedData) {
            console.log("cart start response: ", returnedData);

            // WEB STORAGE - SESSION STORAGE
            //var sessionID = returnedData['s_id'];

            if (returnedData['status'] == 'fail') {
                $("#msgs").text(returnedData['reasons']);
            } else {
                sessionStorage.setObject('autosave', {items: []});
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText, textStatus);
        }
    });
});


// cancel the cart
$("#cancelCart").click(function () {
    qtyCheckMessage = "";
    $("#DBchecking").html(qtyCheckMessage);

    console.log("End cart.");
    $.ajax({
        url: "./shoppingcart.php",
        type: "POST",
        dataType: 'json',
        data: {action: "cancelcart"},
        success: function (returnedData) {
            console.log("cart cancel response: ", returnedData);

            // Get infomation from web storage and return the original quantity

            // SESSION STORAGE - CLEAR THE SESSION
            sessionStorage.clear();
            total = 0;            
            $("#totalPrice").html(total);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText, textStatus);
        }
    });
    var shoppingCartList = $("#shoppingCart").html("");
});

// checkout the cart
$("#checkoutcart").click(function () {
    qtyCheckMessage = "";
    $("#DBchecking").html(qtyCheckMessage);

    // retrieve all of the items from the cart:
    var items = $("#shoppingCart li");
    var itemArray = [];

    $.each(items, function (key, value) {

        var item = {
            sku: value.getAttribute("data-item-sku"),
            qty: value.getAttribute("data-item-qty")
        };
        itemArray.push(item);
    });
    var itemsAsJSON = JSON.stringify(itemArray);
    console.log("itemsAsJSON", itemsAsJSON);

    var cartData = sessionStorage.getObject('autosave');


    console.log("Check out cart with the following items", itemArray);
    $.ajax({
        url: "./shoppingcart.php",
        type: "POST",
        dataType: 'json',
        data: {action: "checkoutcart", items: itemsAsJSON},
        success: function (returnedData) {
            console.log("cart check out response: ", returnedData);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText, textStatus);
        }
    });
    var shoppingCartList = $("#shoppingCart").html("");
         location.reload();
           sessionStorage.clear();
});

