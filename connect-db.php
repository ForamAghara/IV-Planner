<?php

/*

CONNECT-DB.PHP

Allows PHP to connect to your database

*/



// Database Variables (edit with your own server information)

$server = 'localhost';

$user = 'root';

$pass = 'root';

$db = 'ivplanner';



// Connect to Database

$conn = mysqli_connect($server, $user, $pass,$db)

or die ("Could not connect to server ... \n" . mysqli_error ());







?>