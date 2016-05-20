function getRateId(id) {
    $('.rateyo').rateYo().on('rateyo.set', function (e, data) {
			var rating = data.rating;
			$.ajax({
				url: './rating.php',
				type: 'POST',
                data: {action: 'addRating', rating: rating, id: id},
				success: function (returnedData) {
					console.log(returnedData);
				}
			});
		});
}

$(function () {
    
          
        var ratings = [];
        $.ajax({
            url: './rating.php',
            type: 'POST',
            dataType: "json",
            async: false,
            data: {action: 'getRatings'},
            success: function (returnedData) {
                ratings = returnedData;
            }
        });

        $('.rateyo').rateYo({
          rating: 0,
          starWidth: '20px',
          halfStar: true,
          numStars: 5,
          spacing: '5px',
          minValue: 1,
          maxValue: 5
        });
        
        
        for (var i = 0; i < ratings.length; i++) {
            
            $('#rateyo' + ratings[i]['id']).rateYo("destroy");
            
            var rating = ratings[i]['rating'];
            var number = ratings[i]['#ofRatings'];
            var rating = rating / number;
            $('#rateyo' + ratings[i]['id']).rateYo({
              rating: rating,
              starWidth: '20px',
              halfStar: true,
              numStars: 5,
              spacing: '5px',
              minValue: 1,
              maxValue: 5
            }).on('rateyo.change', function (e, data) {

        //          console.log(data.rating);
            });
        }

});