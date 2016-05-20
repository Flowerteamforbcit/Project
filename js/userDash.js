
$(document).ready(function() {

    function loadUsers() {
        $.ajax({
            url: "./users.php",
            type: "GET",
            dataType: 'html',
            success: function(returnedData) {
                //console.log("cart checkout response: ", returnedData);
                $("#userrows").html(returnedData);
                //window.location.href = "user-editor.html";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });
    }

    loadUsers();


    $("#addNewUser").submit(function(e) {
        e.preventDefault();
        // get values from form
        var Login = $("#addLogin").val();
        var Email = $("#addEmail").val();
        var Pw = $("#addPw").val();

        //console.log(Login, Email, Pw);

        $.ajax({
            url: "users.php",
            type: "POST",
            dataType: "JSON",

            data: {action: "add", newLogin: Login,
                newEmail: Email, newPw: Pw},
            success: function(returnedData) {
                loadUsers();
                console.log(returnedData);
            },
            error: function(jqXHR, textStatus, errorThrown) {

                $("#p1").text(jqXHR.statusText);
            }

        });

    });

    $('#users').on('click', '.delete', function() {

        var loginValue = this.getAttribute("id");
        loginValue = loginValue.replace("d-", "");

        $.ajax({
            url: "./users.php",
            type: "POST",
            dataType: 'json',

            data: {action: "delete", name: loginValue},
            success: function(returnedData) {

                loadUsers();

                //window.location.href = "user-editor.html";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });

    });

    $('#users').on('click', '.update', function() {
        var loginValue = this.getAttribute("id");
        //var firstName = $(this).val(
        loginValue = loginValue.replace("u-", "");
        var editedLogin = $(this).parent().parent().find(".name span").text();


        $.ajax({
            url: "./users.php",
            type: "POST",
            dataType: 'json',
            data: {action: "update", id: loginValue, newLogin: editedLogin},
            success: function(returnedData) {
                loadUsers();

                //window.location.href = "user-editor.html";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
            }
        });

    });

    // http://stackoverflow.com/questions/11882693/change-table-cell-from-span-to-input-on-click
    $('#users').on('click', 'span', function() {

        var $td = $(this).parent();
        var $input = null;

        var val = $(this).html();
        //name changing field
        if($td.attr('class') === 'name') {
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