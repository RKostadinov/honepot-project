<?php

function antixss($string) {


    //Check for a apostrophe
    if(strstr($string, "&")) {
       return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "<")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, ">")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "'")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "%")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "script")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "SCRIPT")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, ")")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "(")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "#")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "$")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, ";")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "[")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "]")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "|")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "~")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "^")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "`")) {
        return false; //Tell your code that a detected attack was found
    }

    return true;
}