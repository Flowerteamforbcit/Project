$(document).ready(function(){

	//togle effect
	$("#changePW").click(function(){
		$("#editForm").toggle(); 
	});    

	$("#commentbtn").click(function(){
		$("#comments").toggle();

	})
	
	// Hover effect
	var e = document.getElementById('helpmark');
	e.onmouseover = function() {
		document.getElementById('popup').style.display = 'block';
	}
	e.onmouseout = function() {
		document.getElementById('popup').style.display = 'none';
	}
	
});
