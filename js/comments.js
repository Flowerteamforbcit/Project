$(document).ready(function () {
	
	function loadComments() {
		var product_id = document.getElementsByClassName("comments")[0].getAttribute("id");
		
        $.ajax({
            url: "./loadcomments.php?id="+product_id,
            type: "GET",
            dataType: 'html',
            success: function (returnedData) {
				console.log(product_id);
                $("#commentlist").html(returnedData);
				
			},
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText, textStatus);
			}
		});
	}
	
    loadComments();

	
	});	