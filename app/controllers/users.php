<?php

namespace Controllers;
use Models\User;

class Users {
    /**
     * Always salt and hash your passwords!
     *
     * @param string $password Password
     * @return string $saltyPassword
     *
     **/
    protected static function hash_password($password) {
        $saltyPassword = password_hash($password, PASSWORD_DEFAULT);
        return $saltyPassword;
    }
    /**
     * Create a new user
     *
     * @param string $email Email address
     * @param string $password Password
     * @return object $user User object created in DB
     **/
    public static function create_user($email, $password) {
        $saltyPassword = self::hash_password($password);
        $user = User::create(['email'=>$email,'password'=>$saltyPassword]);
        return $user;
    }

    /**
     * @param string $email Email address for query
     * @param string $password Password used to compare to hashed password in DB
     * @return array|null|string $user Return user if found, null if not found, and string if password does not match
     */
    public static function check_user($email, $password) {
        // grab user from db
        $userExists = User::query()->where('email',$email)->get()->toArray();
        // if user exists check password, if not return null
        if (!empty($userExists)) {
            if (password_verify($password, $userExists[0]['password']) === false) {
                $user = 'password';
            } else {
                $user = $userExists;
            }
        } else {
            $user = null;
        }
        return $user;
    }
}