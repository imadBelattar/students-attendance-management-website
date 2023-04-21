<?php

// Get the values of the form elements
$EmploiHtml = $_POST['EmploiHtml'];
$key = $_POST['key'];

$json = file_get_contents('../siteWeb/JSON/test.json'); // Read the file into a string
$data = json_decode($json); // Decode the JSON string into a PHP object

// Make changes to the data object
$data->{$key} = $EmploiHtml;

$json = json_encode($data); // Encode the data object back into a JSON string
file_put_contents('../siteWeb/JSON/test.json', $json); // Write the JSON string back to the file