
$(document).ready(function() {

    function loadProducts() {
        $.ajax({
            url: "./productsDash.php",
            type: "GET",
            dataType: 'html',
            success: function(returnedData) {
                //console.log("cart checkout response: ", returnedData);
                $("#productsrows").html(returnedData);
                //window.location.href = "user-editor.html";

                $.ajax({
                    url: "checkQuantity.php",
                    type: "POST",
                    dataType: "JSON",
                    success: function(returnedData) {
                        for(var i=0; i<returnedData.length;i++){
                            if(returnedData[i]['Quantity'] ==0){
                                alert("Hi Admin \n\nPlease check your item quantity");
                            }
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                        $("#p1").text(jqXHR.statusText);
                    }

                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });
    }

    loadProducts();


    $("#addNewProduct").submit(function(e) {
        e.preventDefault();
        // get values from form
        var Sku = $("#addSku").val();
        var ItemPrice = $("#addItemPrice").val();
        var Desc = $("#addDesc").val();
        var Path = $("#addPath").val();
        var Quantity = $("#addQuantity").val();
    /*    <input id="addSku" type="text" placeholder="Sku" required="required"/>
            <input id="addItemPrice" type="text" placeholder="Item Price" required="required"/>
            <input id="addDesc" type="text" placeholder="Description" required="required"/>
            <input id="addPath" type="text" placeholder="Path" required="required"/>
            <input id="addQuantity" type="text" placeholder="Quantity" required="required"/>
            <input id="submitNewProduct" type="submit" value="Add"/>
*/
        //console.log(Sku, Desc, ItemPrice);

        $.ajax({
            url: "productsDash.php",
            type: "POST",
            dataType: "JSON",
            data: {action: "add", newSku: Sku, newItemPrice: ItemPrice,
                newDesc: Desc, newPath: Path, newQuantity: Quantity},
            success: function(returnedData) {
                loadProducts();
                console.log(returnedData);
            },
            error: function(jqXHR, textStatus, errorThrown) {

                $("#p1").text(jqXHR.statusText);
            }

        });

    });

    $('#product').on('click', '.delete', function() {

        var loginValue = this.getAttribute("id");
        loginValue = loginValue.replace("d-", "");

        $.ajax({
            url: "./productsDash.php",
            type: "POST",
            dataType: 'json',

            data: {action: "delete", id: loginValue},
            success: function(returnedData) {

                loadProducts();

                //window.location.href = "user-editor.html";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });

    });

    
    $('#product').on('click', '.update', function() {
        var IdValue = this.getAttribute("id");
        //var firstName = $(this).val(
        IdValue = IdValue.replace("u-", "");
        var editedSku= $(this).parent().parent().find(".sku span").text();


        $.ajax({
            url: "./productsDash.php",
            type: "POST",
            dataType: 'json',
            data: {action: "update", id: IdValue, newSku: editedSku},
            success: function(returnedData) {
                loadProducts();

                //window.location.href = "user-editor.html";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });

    });

    // http://stackoverflow.com/questions/11882693/change-table-cell-from-span-to-input-on-click
    $('#product').on('click', 'span', function() {

        var $td = $(this).parent();
        var $input = null;

        var val = $(this).html();
        //name changing field
        if($td.attr('class') === 'sku') {
            //var val = $(this).html();
            $td.html('<input type="text" value="' + val + '"/>');
            $input = $td.find('input');
            $input.focus();
            $input.select();
        }
        //Email changing field

        if($input != null) {

            $input.on('blur', function() {
                $(this).parent().html('<span>' + $(this).val() + '</span>');
            });

            $input.keyup(function(e) {
                if(e.which == 13) {
                    $(this).parent().html('<span>' + $(this).val() + '</span>');
                } else if(e.which == 27) {
                    // escape key, means user canceled operation
                    $(this).parent().html('<span>' + val + '</span>');
                }
            });
        }
    });



});