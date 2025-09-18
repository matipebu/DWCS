
<?php
define("USER","admin");
define("PASS",'$2y$12$f3X/J1rf5ZEnSXVIFR0yrOzc17kQy60yrq/3YJMQ9nglzi5NvkeUK');
function login2($user, $pass){
    $hash = password_hash($pass);
    return !empty($user) && !empty($pass) && $user == USER && $hash == PASS;
}
$user = "admin";
$pass = "1234";
echo "El login para $user y $pass es ",login($user, $pass)?"correcto":"incorrecto";

