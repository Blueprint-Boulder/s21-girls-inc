<?php
$entry_id = '#';  // Test Create Form Entry
$field_id = '#';  // Score field
$entry = GFAPI::get_entry( $entry_id );
$entry[ $field_id ] = $entry[ $field_id ] + 5;
$result = GFAPI::update_entry( $entry );
return $result;