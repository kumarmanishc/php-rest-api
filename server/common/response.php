<?php
/**
 * function for sendning response to uesr
 */
function sendResponse($resp_code,$data,$message){
    echo json_encode(array('code'=>$resp_code,'message'=>$message,'data'=>$data));
}