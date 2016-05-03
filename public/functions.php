<?php
function inputHas ($key) {
    if (isset($_REQUEST[$key])) {
        return true;
    }

    return false;
}
function inputGet ($key) {
    if (isset($_REQUEST[$key])) {
        return $_REQUEST[$key];
    }

   return NULL;
}

function escape($input){
    return htmlentities($input);
}
