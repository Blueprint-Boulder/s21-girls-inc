<?php
// BB Game login session code
add_action('init', 'start_session', 1);
function start_session() {
  if(!session_id()) {
    session_start();
  }
}

add_action('end_session_action','end_session');
function end_session() {
  session_destroy();
}
?>
