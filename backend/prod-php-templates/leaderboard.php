<?php
/**
 * Link to this code by Pigavel Pavel: https://stackoverflow.com/questions/2477496/php-sort-array-by-subarray-value
 * @param array $array
 * @param string $value
 * @param bool $asc - ASC (true) or DESC (false) sorting
 * @param bool $preserveKeys
 * @return array
 * */
function sortBySubValue($array, $value, $asc = true, $preserveKeys = false)
{
    if (is_object(reset($array))) {
        $preserveKeys ? uasort($array, function ($a, $b) use ($value, $asc) {
            return $a->{$value} == $b->{$value} ? 0 : ($a->{$value} <=> $b->{$value}) * ($asc ? 1 : -1);
        }) : usort($array, function ($a, $b) use ($value, $asc) {
            return $a->{$value} == $b->{$value} ? 0 : ($a->{$value} <=> $b->{$value}) * ($asc ? 1 : -1);
        });
    } else {
        $preserveKeys ? uasort($array, function ($a, $b) use ($value, $asc) {
            return $a[$value] == $b[$value] ? 0 : ($a[$value] <=> $b[$value]) * ($asc ? 1 : -1);
        }) : usort($array, function ($a, $b) use ($value, $asc) {
            return $a[$value] == $b[$value] ? 0 : ($a[$value] <=> $b[$value]) * ($asc ? 1 : -1);
        });
    }
    return $array;
}

// Get all entries and vardump them
$form_id = '#'; // Create Account Form
$entries = GFAPI::get_entries( $form_id);

// Sort entries based on score: want top 5 highest scores and to preserve keys
$score_id = '#'; // Score Field
$sorted_arr = sortBySubValue($entries, $score_id, false, true);

// Print at most 5 entries
$count = 0;
$first_id = '#'; // Firstname
$last_id = '#'; // Lastname
foreach($sorted_arr as $entry) {
    if($count >= 5) {
        break;
    }
    $count = $count + 1;
    echo '<div style="overflow: hidden;"><p style="float: left; margin-left: 5%;">'.$count.". ".$entry[$first_id].' '.$entry[$last_id].'</p><p style="float: right;">'.$entry[$score_id].'</p></div>';
    echo '<hr style="height:1px;border-width:0;color:#ed1849;background-color:#ed1849;margin-left: 5%;">';
}