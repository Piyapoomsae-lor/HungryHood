<?php

namespace app\models;

class Users_permission {
  
    private function Permission($permission_number) {
        $permission = isset($_SESSION['user']['permission']) ?
                $_SESSION['user']['permission'] : [];
        return (($permission & $permission_number ) == $permission_number);
    }

    public static function IsUser() {
        return Users_permission::Permission(1);
    }

    public static function IsManager() {
        return Users_permission::Permission(2);
    }

    public static function IsAdmin() {
        return Users_permission::Permission(4);
    }

    public static function IsSuperAdmin() {
        return Users_permission::Permission(8);
    }
    
    public static function PermissionDetail($permission_number) {
        $str = '';
        if(($permission_number & 1) == 1){
            $str .= '<button class="btn btn-sm btn-info ">User</button>';
        }
        if(($permission_number & 2) == 2){
            $str .= '<button class="btn btn-sm btn-primary">Manger</button>';
        }
        if(($permission_number & 4) == 4){
            $str .= '<button class="btn btn-sm btn-success">Administrator</button>';
        }
        if(($permission_number & 8) == 8){
            $str .= '<button class="btn btn-sm btn-danger">Super Administrator</button>';
        }
        
        return $str;
    }
    
    public static function IsPromisesEditUsers() {
        return Users_permission::IsAdmin();
    }
    
}
