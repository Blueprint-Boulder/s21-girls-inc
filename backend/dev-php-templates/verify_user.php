<?php

// This code verifies both password and username

// Verify login credentials function
function verifyLogin($username, $password) {

    // Find user -- will get NULL if user does not exist
    $form_id = '#'; // Create account form
    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array(
            array(
                'key'   => '#',    // Field ID for username
                'value' => $username,
            ),
        )
    );
    $entry = GFAPI::get_entries( $form_id, $search_criteria);
    if(empty($entry)) {
        return false;
    }
    var_dump($entry); // TODO: deleteme

    // Use PW entry ID, and get item 0 because it's only item in array
    if($entry[0]['#'] === $password) {
        echo "can start session";
        return true;
    }
    else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
$un = $_POST['<username field name>'];
$pw = $_REQUEST['<password field name>'];
if($un != "") {
    if($pw != "") {
        if(verifyLogin($un, $pw)) {
            // Redirect to home page
            header('Location: //girlsinc...[rest of url]');
            exit();
        } else {
            echo "<br>Credentials are incorrect<br>";
        }
    }
}
}
