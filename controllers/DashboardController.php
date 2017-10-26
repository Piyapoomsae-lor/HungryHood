<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Api;
use app\models\Users;
use yii\helpers\Url;

class DashboardController extends Controller {

    public function actionIndex() {
        if (!Users::IsLogin())
            return $this->goHome();


        return $this->render('index');
    }

    public function actionUsers() {
        if (!Users::IsLogin())
            return $this->goHome();

        $sort = [
            'id' => 'asc',
            'username' => 'asc',
            'first_name' => 'asc',
            'last_name' => 'asc',
            'email' => 'asc',
            'address' => 'asc',
        ];

        $sort_like = [
        ];

        $url_buttonEdit = Url::to(['users/edit']);

        $url ['url_buttonEdit'] = $url_buttonEdit;

        if (\Yii::$app->request->get()) {
            
        }
        $users = Users::getUsers(); 
        var_dump($users); 
        $json = Api::http_response('http://127.0.0.1/api/v1/administrator/users.php?token_api=ABC&limit_offset=1&limit_count=1&sort=DESC');

        //var_dump(Users::IsSuperAdmin());


        return $this->render('users', [
                    'users' => json_decode($json),
                    'IsPromisesEditUsers' => Users::IsPromisesEditUsers(),
                    'url' => $url,
        ]);
    }

}
