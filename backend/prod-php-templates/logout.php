<?php
do_action('end_session_action');
if($_SESSION['<UN name field>'] != "")
{
    header('Location: //www.girlsincdenver.org/bb-girls_inc_game/bb-logout/');
    exit();
}
?>