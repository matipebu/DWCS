<?php
define("USER","admin");
define("PASS","1234");

function login($user, $pass){
    return !empty("$user") && !empty("$pass") && $user == USER && $pass == PASS;
    echo "sesion iniciada";
}
 login(admin,1234);
 