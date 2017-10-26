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

    public static function Login($data) {

        $users = [
            (object) [
                'id' => '1',
                'username' => 'admin',
                'password' => 'admin',
                'authKey' => 'test100key',
                'accessToken' => '1ABCDEFG',
                'promises' => 12,
            ],
            (object) [
                'id' => '2',
                'username' => 'demo',
                'password' => 'demo',
                'authKey' => 'test101key',
                'accessToken' => '2ZCZVCCBZB',
                'promises' => 8,
            ],
        ];

        /* Check Variable Ok. */
        if (isset($data['username']) && isset($data['password'])) {


            /* Get data By APi. */ /*             * * MOC DATA ** */
            $user = $users[0];

            /* Set Data User to Sestion. */
            $_SESSION['user'] = (object) [
                        'id' => $user->id,
                        'id' => $user->username,
                        'promises' => $user->promises,
            ];

            return TRUE;
        }
        return FALSE;
    }

    public static function LogOut() {

        /* Destroy Session. */
        session_destroy();
    }

    public static function IsLogin() {

        return isset($_SESSION['user']->id) ? $_SESSION['user']->id : FALSE;
    }

    public static function IsUser() {
        $promises = isset($_SESSION['user']->promises) ?
                $_SESSION['user']->promises : [];
        return (($promises & 1 ) == 1);
    }

    public static function IsManager() {
        $promises = isset($_SESSION['user']->promises) ?
                $_SESSION['user']->promises : [];
        return (($promises & 2 ) == 2);
    }

    public static function IsAdmin() {
        $promises = isset($_SESSION['user']->promises) ?
                $_SESSION['user']->promises : [];
        return (($promises & 4 ) == 4);
    }

    public static function IsSuperAdmin() {
        $promises = isset($_SESSION['user']->promises) ?
                $_SESSION['user']->promises : [];
        return (($promises & 8 ) == 8);
    }

    public static function IsPromisesEditUsers() {
        return Users::IsAdmin();
    }

}
