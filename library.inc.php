<?php

$monthList = [
    1 => 'січень',
    'лютий',
    'березень',
    'квітень',
    'травень',
    'червень',
    'липень',
    'серпень',
    'вересень',
    'жовтень',
    'листопад',
    'грудень',
];

function createSelect($firstIndex, $lastIndex, $name, $value = null, $titles = null)
{
    $resultString = "<select name=\"{$name}\">";
    for ($i = $firstIndex; $i <= $lastIndex; $i++) {
        if ($titles === null)
            $title = $i;
        else
            $title = $titles[$i];
        if ($value == $i)
            $select = 'selected';
        else
            $select = '';
        $resultString .= "<option {$select} value=\"{$i}\">{$title}</option>";
    }
    $resultString .= "</select>";
    return $resultString;
}