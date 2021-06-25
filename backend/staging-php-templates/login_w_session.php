<?php

// NOTE: logout is still unsuccessful with this iteration!

// Verify login credentials function
function verifyLogin($username, $password) {

    // Find user -- will get NULL if user does not exist
    $form_id = '#'; // Create account form
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
    if(empty($entry)) {
        return false;
    }

    // Use PW entry ID, and get item 0 because it's only item in array
    if($entry[0]['#'] === $password) {
        $_SESSION['<UN field name>'] = $username;
        return true;
    }
    else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
if($_POST['<username field name>'] != "") {
    if($_REQUEST['<password field name>'] != "") {
        // TODO add back in: do_action('end_session_action');
        if(verifyLogin($_POST['<username field name>'], $_REQUEST['<password field name>'])) {
            header('Location: //girlsinc...[rest of url]');
            exit();
        } else {
            echo "<br>Credentials are incorrect<br>";
        }
    }
}
}