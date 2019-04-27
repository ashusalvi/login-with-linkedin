<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once "init.php";
$user = getCallback();
$firstName = $user['getProfInfo']->firstName->localized->en_US;
$LastName = $user['getProfInfo']->lastName->localized->en_US;

$profileArray = (array)$user['getProfInfo']->profilePicture; 
$profileImage = $profileArray['displayImage~']->elements[1]->identifiers[0]->identifier;

$emaiArrayconv = (array)$user['getEmail']->elements[0];
$getEmail = $emaiArrayconv['handle~']->emailAddress;
// $_SESSION['user'] = $user;
// header("location: landing.php");