<?php
    //By Scott Arciszewski on StackOverflow
    //Generate a random string, using a cryptographically secure pseudorandom number generator (random_int)
    function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    //I believe the password_hash function already automatically generates a salt
    //But I don't think it hurts to add the salt anyway
    function saltAndHashString($toSalt, $salt){
        return(password_hash($toSalt . $salt, PASSWORD_ARGON2ID));
    }
?>