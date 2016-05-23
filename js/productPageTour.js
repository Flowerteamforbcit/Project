// Instance the tour
var tour = new Tour({
	steps: [
	{
		element: "#productInfo",
		title: "Product information",
		content: "Check information of the product"
	},
	{
		element: "#map",
		title: "Map",
		content: "Check store location with googl map"
	},
	{
		element: "#commentButtonContainer",
		title: "Comments",
		content: "press the button to see the comments"
	}
	]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();