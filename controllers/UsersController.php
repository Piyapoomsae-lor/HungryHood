<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Users;
use app\models\Api;

class UsersController extends Controller {

    public function actionIndex() {
        if (Users::IsLogin())
            return $this->redirect('dashboard/index');

        if ($input = \Yii::$app->request->post()) {


            if (isset($input["username"]) && isset($input["password"])) {

                /* Login. */
                $model = Users::Login([
                            'username' => $input["username"],
                            'password' => $input["password"],
                ]);
            }
            return $this->goHome();
        }
        return $this->render('index');
    }

    public function actionLogout() {
        Users::LogOut();
        return $this->redirect('index');
    }

    public function actionEdit() {
        if (!Users::IsLogin())
            return $this->goHome();

        if (!Users::IsPromisesEditUsers())
            return $this->goBack();

        $id = isset($_GET['id']) ? $_GET['id'] : [];
        $status = null;
        if (\Yii::$app->request->post()) {
            if (isset($_POST['submit'])) {
                if (strtolower('save') == strtolower($_POST['submit'])) {
                    
                    $status['submit'] = ['save' => 'ok'];
                } else if (strtolower('delete') == strtolower($_POST['submit'])) {
                    
                    $status['submit'] = ['delete' => 'ok'];
                }

                $id = $_POST['id'];
            }
        }

        if ($id) {
            $json = Api::http_response('http://127.0.0.1/api/v1/administrator/user.php?token_api=ABC&id=' . $id);
        }

        return $this->render('edit', [
                    'user' => json_decode($json),
                    'status' => $status,
        ]);
    }

}
