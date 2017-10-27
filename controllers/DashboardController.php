<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Users_permission;
use app\models\Users;
use yii\helpers\Url;

class DashboardController extends Controller {

    public function actionIndex() {
        if (!Users::IsLogin())
            return $this->goHome();

        $url_buttonUsers = Url::to(['dashboard/users']);

        $url ['url_buttonUsers'] = $url_buttonUsers;

        return $this->render('index', [
                    'url' => $url
        ]);
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
        foreach ($users as $values)
            $values->users_permission = Users_permission::PermissionDetail($values->users_permission);

        return $this->render('users', [
                    'users' => $users,
                    'IsPromisesEditUsers' => Users_permission::IsPromisesEditUsers(),
                    'url' => $url,
        ]);
    }

}
