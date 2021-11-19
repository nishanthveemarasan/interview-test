<?php

//include the CommonService Class to sanitize the inputs
include "../Classes/CommonService.class.php";

$commonService = new CommonService();
//get the register form inputs
$name = $commonService->sanitize_input($_POST['name']);
$email = $commonService->sanitize_input($_POST['email']);
$password = $commonService->sanitize_input($_POST['password']);
$confirmPassword = $commonService->sanitize_input($_POST['confirm_password']);

//include the signup class to do the form validation and store the data
//to the database
include "../Classes/DbConn.class.php";
include "../Classes/SignUp.class.php";
$signup = new SignUp($name, $email, $password, $confirmPassword);

//do the validation and pass the error to user;
$validateData = $signup->formValidation();
$arr = array();
if ($validateData['valid']) {
    //if the valdation is successfull, store the data to user, send confirmation emails and show successful message to users
    $store = $insertData = $signup->storeData();
    if($store['msg'] === 'success')
    {
        CommonService::send_email($name, $email);
    }
    CommonService::send_email($name, $email);
    $arr = array('msg' => 'success', 'data' => 'Data has been inserted successfully!!');
} else {
    //if the validation fails, show the errror message to user
    $arr = array('msg' => 'failed', 'data' => $validateData['msg']);
}
echo json_encode($arr);
