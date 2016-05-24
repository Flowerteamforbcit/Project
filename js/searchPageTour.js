// Instance the tour
var searchtour = new Tour({
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
searchtour.init();

// Start the tour
searchtour.start();