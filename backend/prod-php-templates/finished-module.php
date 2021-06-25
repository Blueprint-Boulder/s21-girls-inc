<?php

// Remember to configure each gravity form to passthe right parameters to the GET request!

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
   //var_dump($_GET); //Use this to see what info we got!
$entry_id = $_GET["<form field ID>"]; //TODO: need to change this id to the user's account!
$field_id = '#'; // Score field
$entry = GFAPI::get_entry( $entry_id );
$entry[ $field_id ] = $entry[ $field_id ] + 5; // Adds by 10 for some reason...
$result = GFAPI::update_entry( $entry );
return $result;
}