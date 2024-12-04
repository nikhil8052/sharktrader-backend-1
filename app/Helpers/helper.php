<?php

function successResponse($message="Operation completed successfully.", $data=[]){

    return [
        'code'=>500,
        "message"=>$message,
        'data'=>$data
    ];

}



?>