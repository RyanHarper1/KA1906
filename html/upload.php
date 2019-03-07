<?php

$uploads = '/recordings/';

print_r($_FILES); //this will print out the received name, temp name, type, size, etc.

$input = $_FILES['audio_data']['tmp_name']; //get the temporary name that PHP gave to the uploaded file
$output = $_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea

$concat = "/home/aldxrlvo9enj/public_html" . $uploads . $output;

//move the file from temp name to local folder using $output name
move_uploaded_file($input, $concat)

?>
