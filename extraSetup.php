<?php
	@require_once 'functions.php';

	// THIS WORKS! I'M COMMENTING IT out FOR OTHER REASONS
	createUser("Anant", "ajaitha17@cmc.edu", "ajaitha17", encrypt("abc"), "2017", "Beckett");
	createUser("Nick", "nlillie17@cmc.edu", "nlillie17", encrypt("123"), "2017", "Appleby");
	createUser("Matt", "mwong18@cmc.edu", "mwong18", encrypt("wong"), "2018", "Berger");
	createUser("Max", "mbreitbarth18@cmc.edu", "mbreitbarth18", encrypt("maxx") ,"2018", "Wohlford");
	createUser("Kevin", "kwolfson15@cmc.edu", "kwolfson15", encrypt("brazil"), "2015", "Benson");
	createUser("Austin", "aschoff16@cmc.edu", "aschoff16", encrypt("austin"), "2016", "Green");

	// THIS WORKS! I'M COMMENTING IT out FOR OTHER REASONS
	extrainsertPetitions(1,"Hackathon", "We need more Hackathons!");
	extrainsertPetitions(2,"Mattresses", "Our backs deserve better mattresses");
	extrainsertPetitions(3,"Cereal", "We need to get better cereal in Collins");
	extrainsertPetitions(8,"Sunday Snack", "We need sunday snacks more often");
	extrainsertPetitions(9,"Scanners","Poppa needs more scanners");
	extrainsertPetitions(10,"CMC CS","The CMC CS department needs to get more funding");
	extrainsertPetitions(1,"Free coffee", "College students deserve free coffee");

	echo "<a href = 'homePage.php'>Click Here to log in</a>";

	
	
?>
