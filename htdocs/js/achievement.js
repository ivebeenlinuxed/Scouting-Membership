Achievement = new Object();
dojo.addOnLoad(function() {
	// our test data store for this example:
	Achievement.store = new dojox.data.JsonRestStore( {
		target : "/API/achievements/",
		idAttribute : "id"
	});
});