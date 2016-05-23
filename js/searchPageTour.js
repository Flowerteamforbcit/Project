// Instance the tour
var tour = new Tour({
	steps: [
	{
		element: ".search",
		title: "Search",
		content: "Type anything you want to find"
	},
	{
		element: ".dropdown-toggle",
		title: "Sort",
		content: "Sort the result as your needs"
	}
	]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();