<?php
include_once('../common/include.php');
include_once('../common/encipher.php');

$user = json_decode(file_get_contents("php://input"));
if(!$user->name){
    sendResponse(400, [] , 'Name Required !');  
}else if(!$user->email){
    sendResponse(400, [] , 'Email Required !');  
}else if(!$user->password){
    sendResponse(400, [] , 'Password Required !');        
}else if(!$user->contact){
    sendResponse(400, [] , 'Contact Required !');  
}else{
    $password = doEncrypt($user->password);
    $conn=getConnection();
    if($conn==null){
        sendResponse(500, $conn, 'Server Connection Error !');
    }else{
        $sql="INSERT INTO user(name, email, password, contact)";
        $sql .= "VALUES ('".$user->name."','".$user->email."','";
        $sql .= $password."','".$user->contact."')";

        $result = $conn->query($sql);
        if ($result) {
            sendResponse(200, $result , 'User Registration Successful.');
        } else {
            sendResponse(404, [] ,'User not Registered');
        }
        $conn->close();
    }
}
