<?php
    include 'sqlHandler.php';
    include 'lib.php';
    $salt = "mmm, salty!";

    class user{
        public $id;
        public $username;
        public $password;
        public $email;
        public $token;
        public $ip;

        function updateTableEntry(){
            global $conn;
            $sql = $conn->prepare("UPDATE users SET username=?, password=?, email=?, token=?, ip=? WHERE id=?");
            $sql->bind_param("sssssi", $this->username, $this->password, $this->email, $this->token, $this->ip, $this->id);
            $sql->execute();
        }

        function setUsername($newname){
            if(isUsernameAlphanum($newname)){
                $this->username = $newname;
            }
        }

        function setPassword($newpass){
            $this->password = $newpass;
        }

        function setToken($newtoken = NULL){
            if($newtoken === NULL){
                $this->token = $this->buildToken();
            } else { $this->token = $newtoken; }
        }

        function buildToken(){
            return(random_str(10));
        }
    }
    
    function buildUserObject($user){
        $newUser = new user;
        $newUser->id = $user['id'];
        $newUser->username = $user['username'];
        $newUser->password = $user['password'];
        $newUser->email = $user['email'];
        $newUser->token = $user['token'];
        $newUser->ip = $user['ip'];
        return($newUser);
    }

    function getUserObjectFromUsername($username){
        $userinfo = getUserInfoFromUsername($username);
        return(buildUserObject($userinfo));
    }

    function getUserInfoFromUsername($username){
        global $conn;
    
        if(!isUsernameAlphanum($username)){
            return('INVALID');
        }
    
        $result = query("select * from users where username='" . $username . "';");
        return($result);
    }

    function isUsernameAlphanum($username){
        return(ctype_alnum($username));
    }
?>