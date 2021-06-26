<?php

function findEntry($username) {
    $form_id = '#'; // Create account form (staging)
    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array(
            array(
                'key'   => '#',     // Field ID for username (staging)
                'value' => $username,
            ),
        )
    );
    $entry = GFAPI::get_entries( $form_id, $search_criteria);
    return $entry;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    // This is currently the entry for module user submitted
    // $entry_id = $_GET["entry_id"]; // TODO: this is submitted entry
    $field_id = '#'; // Score field
    $resp = findEntry($_SESSION['<UN>']);
    if(empty($resp)) {
        header('Location: //girlsincdev.wpengine.com/bb-proofofconcept-login/');
        exit();
    }
    $entry = $resp[0];
    var_dump( $entry );
    echo "Current score is ".$entry[$field_id];
    $entry[ $field_id ] = $entry[ $field_id ] + 5; // Adds by 10 for some reason...
    $result = GFAPI::update_entry( $entry );
    return $result;
}
?>