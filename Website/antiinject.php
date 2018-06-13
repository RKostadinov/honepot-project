<?php

function antiinject($string) {

    //Check for a apostrophe
    if(strstr($string, "'")) {
        return false; //Tell your code that a detected attack was found
    }
    //Check for UNION SELECT
    if(strstr($string,"union all select")) {
        return false; //Tell your code that a detected attack was found
    }

    if(strstr($string,"union select")) {
        return false; //Tell your code that a detected attack was found
    }
    //order by * attack
    if(strstr($string,"order by")) {
        return false; //Tell your code that a detected attack was found
    }
    //and 1=1 attack
    if(strstr($string,"and 1=1")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "drop")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "delete")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "update")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "create")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "alter")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "insert into")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "where")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "id")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "limit")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "*")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "declare")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "||")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "&&")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, ">")) {
        return false; //Tell your code that a detected attack was found
    }
    if(strstr($string, "<")) {
        return false; //Tell your code that a detected attack was found
    }
    return true;
}