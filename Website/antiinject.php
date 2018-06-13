<?php
/**
 * Created by PhpStorm.
 * User: MrARM
 * Date: 1/19/2015
 * Time: 5:37 PM
 */
function antiinject($string,$block) {
    $BOOL_NOT_FOUND_ERROR = "Your AntiInject integration was not configured correctly!, please check your PHP Code."; //called when your code has a missing or invalid bool on parameter 2(BOOL)
    $APOSTROPHE_FOUND = "A mysql apostrophe based attack was detected, Anti SQL Injection By MrARM Has Blocked the attack.";
    $UNION_FOUND = "A mysql Union SELECT based attack was detected, Anti SQL Injection By MrARM Has Blocked the attack.";
    $ORDER_FOUND = "A mysql Order By based attack was detected, Anti SQL Injection By MrARM Has Blocked the attack.";
    $ONEONE_FOUND = "A mysql 1=1 based attack was detected, Anti SQL Injection By MrARM Has Blocked the attack.";
    if(!is_bool($block)) {
        //calls the BOOL_NOT_FOUND_ERROR when the second parameter is not true or false
        echo($BOOL_NOT_FOUND_ERROR);
        return false;
    }

    var_dump($string);

    //Check for a apostrophe
    if(strstr($string, "'")) {
        //Is Block-Page on?
        if($block) {
            die($APOSTROPHE_FOUND);
        }
        else{
            return false; //Tell your code that a detected attack was found
        }
    }
    //Check for UNION SELECT
    if(strstr($string,"union all select")) {
        //Is Block-Page on?
        if($block) {
            die($UNION_FOUND);
        }
        else{
            return false; //Tell your code that a detected attack was found
        }
    }

    if(strstr($string,"union select")) {
        //Is Block-Page on?
        if($block) {
            die($UNION_FOUND);
        }
        else{
            return false; //Tell your code that a detected attack was found
        }
    }
    //order by * attack
    if(strstr($string,"order by")) {
        //Is Block-Page on?
        if($block) {
            die($ORDER_FOUND);
        }
        else{
            return false; //Tell your code that a detected attack was found
        }
    }
    //and 1=1 attack
    if(strstr($string,"and 1=1")) {
        //Is Block-Page on?
        if($block) {
            die($ONEONE_FOUND);
        }
        else{
            return false; //Tell your code that a detected attack was found
        }

    }
    return true;
}