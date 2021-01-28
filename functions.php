<?php

function checkRegister($dni , $nom , $cognom , $email , $adreca , $telefon , $cp , $pass1 , $pass2){

    if(empty(trim($dni)) || empty(trim($nom)) || empty(trim($cognom)) || empty(trim($email)) || empty(trim($adreca)) || empty(trim($telefon)) || empty(trim($cp)) || empty(trim($pass1)) ||  empty(trim($pass2))){
        return true;
    }else{
        return false;
    }

}

function isEmail($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function encriptarPassword($pass1){
    $hash = password_hash($pass1 , PASSWORD_DEFAULT);
    return $hash;
}

function generateToken(){
    $token = md5(uniqid(mt_rand() , false));
    return $token;
}

function comparePasswords($pass1 , $pass2){
    if(strcmp($pass1,$pass2) !== 0){
        return false;
    }else{
        return true;
    }
}

function checkPassword($pass,$passBBDD){
    if(password_verify($pass, $passBBDD)){
        return true;
    } else{
        return false;
    }
}

?>