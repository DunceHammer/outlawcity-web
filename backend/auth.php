<?php
    include 'sqlHandler.php';
    $salt = "mmm, salty!";

    class user{
        public $id;
        public $username;
        public $password;
        public $token;
        public $ip;
    }
    
    function buildUserObject($user){
        $newUser = new user;
        $newUser->id = $user['id'];
        $newUser->username = $user['username'];
        $newUser->password = $user['password'];
        $newUser->token = $user['token'];
        $newUser->ip = $user['ip'];
        return($newUser);
    }

    function getUserInfoFromUsername($username){
        global $conn;
    
        if(!isUsernameValid($username)){
            return('INVALID');
        }
    
        $result = query("select * from users where username='" . $username . "';");
        return($result);
    }
    
    function saltAndHashString($toSalt){
        return;
    }

    function isUsernameValid($username){
        return(ctype_alnum($username));
    }
?>