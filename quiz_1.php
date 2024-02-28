<?php

$conn = new mysqli("localhost","root","","assesment_db");

function generate($user_id, $conn){
    $query = "SELECT * from users where id = $user_id";

    $res = $conn->query($query);

    if($res->num_rows > 0){
        while ($row = $res->fetch_assoc()){

            // Generate Token String
            $generateToken = md5($row['email'].time());

            $checkJson = json_decode($row['token']);


            // Check count token
            if($checkJson != null){
                if(count($checkJson) == 3){
                    array_splice($checkJson, 0, 1);
                }
            }

            
            // Get JSON from table structure
            $checkJson[]['token'] = $generateToken;

            $updateToken = json_encode($checkJson);


            $q = "UPDATE users SET token='$updateToken' where id = $user_id";

            $resultupdate = $conn->query($q);

            if($resultupdate === TRUE){
                return [
                    'status' => true,
                    "message" => "Success Generate Token",
                    "list_token"=> $updateToken,
                    "token" => $generateToken
                ];
            }else{
                // var_dump("error");
                return [
                    'status' => false,
                    "message" => "Error Generate Token"
                ];
            }
        }
    }
}

function verify($user_id, $conn, $token){
    $checkuser = "SELECT * from users where id = $user_id";

    $rescheck = $conn->query($checkuser);

    if($rescheck->num_rows > 0){
        while($row = $rescheck->fetch_assoc()){
            // var_dump($row);
            $checkJson = json_decode($row['token']);

            for ($i=0; $i < count($checkJson) ; $i++) { 
                # code...

                // var_dump($checkJson[$i]->token);
                // $newList = [];

                if($checkJson[$i]->token == $token){


                    // var_dump($checkJson);

                    unset($checkJson[$i]);
                    // var_dump($checkJson);

                    $data_encode = json_encode($checkJson);

                    $q = "UPDATE users SET token ='$data_encode' where id = $user_id";

                    $res = $conn->query($q);

                    if($res === TRUE){
                        return [
                            'status' => true,
                            "message" => "Token is avail and success remove",
                        ];
                    }

                }else{
                    return [
                        'status' => false,
                        "message" => "Token Not Foun"
                    ];
                }
            }
        }
    }

    // return [
    //     "status" => false,
    //     "message" => 'user not found'
    // ];
}

// function to generate token from user_id
var_dump(generate(rand(1,3), $conn));
// var_dump(generate(2, $conn));


// You can change this token
var_dump(verify(rand(1,3), $conn, 'This Column for token'));


// var_dump(verify(2, $conn, 'caffd932c2d985dc4f28940a621499c8'));
