Unzip the folder and store it in XAMPP/htdocs

Next, you need to configure XAMPP so that you can send emails from localhost. The steps are as follows:
1) Turn off your personal email's privacy so that it can access "less secure apps." For us, we went to Google's account settings an disabled the extra security that should be set
	default.
2) Go to XAMPP/php/php.ini and search for "sendmail". The third instance, probably on line 1142, needs to be uncommented out by deleted the semi-colon.
3) In the same php.ini comment out the next "sendmail" line by inserting a semi-colon before the line.
4) Go to XAMPP/php/sendmail.ini and change smtp_server=smtp.mydomain.com to smtp_server=smtp.gmail.com (if you have gmail. If you are using another mail client, modify it accordingly).
5) In the same file, change the smtp_port number to 587.
6) In the same file, fill out the auth_username to equal your email address and auth_password to equal your email password. (Example: auth_username=myname@gmail.com auth_password=mypassword).
7) Restart Apache on your XAMPP control panel.

To setup the app, start your PHP and MySQL server in XAMPP and run
http://localhost/PetitionApp/setupPetition.php

You can start from scratch now or you can run
http://localhost/extrasetup.php
to start from a point with some users already setup and some petitions already inserteed into the database.

In general, you can start from 
http://localhost/homePage.php

The following username - password combinations work with the app as existing users if you run extrasetup.php.

	1) ajaitha17 - abc
	2) nlillie17 - 123
	3) mwong18 - wong
	4) mbreitbarth18 - maxx
	5) kwolfson15 - brazil
	6) aschoff16 - austin

More users can be created but only with the following email IDs.

	ajaitha17@cmc.edu
	nlillie17@cmc.edu
	mwong18@cmc.edu
	mbreitbarth18@cmc.edu
	kwolfson15@cmc.edu
	aschoff16@cmc.edu
	jdoe15@cmc.edu
	mwill16@cmc.edu
	bscore17@cmc.edu
	kgivens18@cmc.edu
	hdelilah15@cmc.edu
	hpotter16@cmc.edu
	hgranger17@cmc.edu
	rweasley18@cmc.edu
	ctaylor15@cmc.edu

We restricted the user IDs because within a school all usernames with a particular college domain shouldn't work. Only the existing email IDs should work and since we don't have access to it as of now we are restricting it to a few that we do know of.

If someone tries to access a page without logging in we just display a message saying they need to log in before accessing that page.
