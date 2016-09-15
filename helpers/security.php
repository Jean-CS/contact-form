<?php

function sanitizeString($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}

function assignValue($field) {
    return 'value="' . sanitizeString($field) . '"';
}

 ?>
