<?php
include 'includes/book-config.inc.php';

// retrieve data from database
$univ = new UniversityDB($connection);
$results = $univ->getAll();

// Tell the browser to expect JSON rather than HTML
header('Content-type: application/json');
// only needed if have to support javascript clients from another domain
header("Access-Control-Allow-Origin: *");
// now output the JSON version of the data
if (is_null($results))
echo '{"error": {"message":
"Value not found or Incorrect query string values"}}';
else
echo json_encode($results);
   
$connection = null;   
?>