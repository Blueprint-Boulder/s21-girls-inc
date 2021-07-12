<?php

function findEntry($username) {
    $form_id = '#'; // Create account form (prod)
    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array(
            array(
                'key'   => '#',     // Field ID for username (prod)
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
    $first = '#'; // first name
    $last = '#'; // last name
    $bday = '#'; // birthday
    $resp = findEntry($_SESSION['<UN field name>']);
    if(empty($resp)) {
        header('Location: //www.girlsincdenver.org/bb-girls_inc_game/');
        exit();
    }
    $entry = $resp[0];
    echo '<div style="margin-bottom: 4%;"><b>'.$entry[$first].' '.$entry[$last].'</b></div>';
    echo '<div style="margin-bottom: 4%;">'.$entry[$field_id].' points</div>';
    echo '<div style="margin-bottom: 4%;">'.$entry[$bday].'</div>';
}
?>