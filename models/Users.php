<?php

use app\models\Api;

namespace app\models;

class Users {

    public static function getUserById($id) {
        $id = sprintf('%d', $id);
        return Api::getDataBySql('SELECT * FROM users AS u WHERE u.id = "' . $id . '";');
    }

    public static function getUsers() {
        return Api::getDataBySql('SELECT * FROM users AS u ');
    }

    public static function updateUser($data) {
        if (isset($data['id']) && isset($data['first_name']) && isset($data['last_name']) && isset($data['email'])) {
            $sql = sprintf('UPDATE  users AS u SET  u.first_name =  "%s",u.last_name =  "%s",u.email =  "%s" WHERE  id ="%d"', $data['first_name'], $data['last_name'], $data['email'], $data['id']);
            Api::getDataBySql($sql);
        }
    }

    public static function Login($data) {

        if (isset($data['username']) && isset($data['password'])) {

            $sql = sprintf('SELECT * FROM users WHERE email = "%s" && password = "%s"', $data['username'], $data['password']);
            $user = Api::getDataBySql($sql);
           
            
            if (!empty($user) && isset($user[0])) {
                 $user = $user[0];
                /* Set Data User to Sestion. */
                $_SESSION['user'] = [
                    'id' => $user->id,
                    'email' => $user->email,
                    'permission' => $user->users_permission,
                ];
            }
            return TRUE;
        }
        return FALSE;
    }

    public static function LogOut() {

        /* Destroy Session. */
        session_destroy();
    }

    public static function IsLogin() {

        return isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : FALSE;
    }

}
