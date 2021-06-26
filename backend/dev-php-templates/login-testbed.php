<?php
// Verify login credentials function
function verifyLogin($username, $password) {
    // TODO: check if user exists: if user exists and passwords match, start session
    $form_id = '#'; // Create form
    // TODO: figure out how to filter
    //$search_criteria['field_filters'][] = array( 'key' => '#', 'value' => $username ); // field ID for username
    $entry = GFAPI::get_entries( $form_id );
    var_dump($entry);

    if(true) { // TODO: verify both credentials are correct
        session_start();
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
        if(verifyLogin($_POST['<username field name>'], $_REQUEST['<password field name>'])) {
            header('Location: //www.girlsinc... [rest of URL]');
            exit();
        } else {
            echo "<br>Credentials are incorrect<br>";
        }
    }
}
}