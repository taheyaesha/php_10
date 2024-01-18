<?php
session_start();
// include"../database/env.php";




//collect data

$Firstname=$_REQUEST['fname'];
$Lastname=$_REQUEST['lname'];
$Email=$_REQUEST['email'];
$Password=$_REQUEST['password'];
$confirmPassword=$_REQUEST['confirmPassword']; 

//validation
$errors=[];

//nameV
if(empty($Firstname))
{
    $errors['name']= "First name is missing";

}
//emailV

if(empty($Email) )
{
    $errors['email']= "Email address is missing";
}
else if (!filter_var($Email,FILTER_VALIDATE_EMAIL))
{
    $errors['email']= "Email address is invalid";
}
//passV
if(empty($Password))
{
    $errors['password']= " Password is missing";
}
else if(strlen($Password)<8)
{
    $errors['password']= " Password is less than 8 digit";
}

//confirmpassword
if(empty($confirmPassword))
{
    $errors['confirmPassword']= "Repeat password is missing";
}
else if($Password != $confirmPassword)
{
    $errors['confirmPassword']= " Password did not match!";
}

//if error found
if(count($errors)>0)
{

    $_SESSION['errors']=$errors;
    //redirection
    header('Location:../Backend/register.php');

}
