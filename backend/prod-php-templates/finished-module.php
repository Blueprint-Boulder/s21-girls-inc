<?php

function findEntry($username) {
    $form_id = '#'; // Create Account Form ID
    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array(
            array(
                'key'   => '#',     // Field ID for username
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
    $field_id = '#'; // Score field
    $resp = findEntry($_SESSION['<UN field name>']);
    if(empty($resp)) {
        header('Location: //www.girlsincdenver.org/bb-girls_inc_game/');
        exit();
    }
    $entry = $resp[0];
    $entry[ $field_id ] = $entry[ $field_id ] + 5;
    $result = GFAPI::update_entry( $entry );
    return $result;
}
?>