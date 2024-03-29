<?php

    $ERROR_USER_DOES_NOT_EXIST = 0;
    $ERROR_USER_ALREADY_EXIST = 1;
    $ERROR_UNKNOWN = 2;
    $ERROR_WRONG_PASSWORD = 3;
    $ERROR_MAIL_NOT_SENT = 4;
    $ERROR_WRONG_CODE = 5;
    $ERROR_SEVERE = 6;
    $ERROR_NOT_SELECTED = 7;
    $ERROR_TECHNICAL_MAIL_NOT_SENT = 8;
    $ERROR_CHANGE = 9;

    $SUCCESS_LOGIN = 10;
    $SUCCESS_REGISTER = 11;
    $SUCCESS_MAIL = 12;
    $SUCCESS_VERIFICATION = 13;
    $SUCCESS_GIFT = 14;
    $SUCCESS_TECHNICAL_MAIL_SENT = 15;
    $SUCCESS_CHANGE = 16;
    $NONE = 17;

    $CODES = array($ERROR_USER_DOES_NOT_EXIST,  $ERROR_USER_ALREADY_EXIST, $ERROR_UNKNOWN, $ERROR_WRONG_PASSWORD, $ERROR_MAIL_NOT_SENT, $ERROR_WRONG_CODE, $ERROR_SEVERE, $ERROR_NOT_SELECTED,
                    $ERROR_TECHNICAL_MAIL_NOT_SENT, $ERROR_CHANGE, $SUCCESS_LOGIN, $SUCCESS_REGISTER, $SUCCESS_MAIL,  $SUCCESS_VERIFICATION, $SUCCESS_GIFT, $SUCCESS_TECHNICAL_MAIL_SENT,$SUCCESS_CHANGE, $NONE);
    
?>