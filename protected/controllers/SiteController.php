<?php

class SiteController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        if (!Yii::app()->user->isGuest) {

            $dataProvider=new CActiveDataProvider('Popup');
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
            ));

        } else {
            $this->actionLogin(); // Если не авторизован, то отправить на форму авторизации
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->getError()) {
            if (Yii::app()->request->getIsAjaxRequest()) {
                echo $error['message'];
            } else {
                Yii::log('ip=' . self::getIp() .' request=' . json_encode($_REQUEST), CLogger::LEVEL_ERROR);
                $this->render('error', $error['message']);
            }
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];

            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionInstall() {

        $auth = Yii::app()->authManager;

        //сбрасываем все существующие правила
        $auth->clearAll();

        //Операции управления пользователями.
        $auth->createOperation('createUser', 'создание пользователя');
        $auth->createOperation('viewUsers', 'просмотр списка пользователей');
        $auth->createOperation('readUser', 'просмотр данных пользователя');
        $auth->createOperation('updateUser', 'изменение данных пользователя');
        $auth->createOperation('deleteUser', 'удаление пользователя');
        $auth->createOperation('changeRole', 'изменение роли пользователя');

        $bizRule='return Yii::app()->user->id==$params["user"]->id;';
        $task = $auth->createTask('updateOwnData', 'изменение своих данных', $bizRule);
        $task->addChild('updateUser');


        //создаем роль для пользователя admin и указываем, какие операции он может выполнять
        $role = $auth->createRole(Users::ROLE_ADMIN);
        $role->addChild('createUser');
        $role->addChild('updateUser');
        $role->addChild('deleteUser');
        $role->addChild('changeRole');
        $role->addChild('viewUsers');
        $role->addChild('readUser');
        $role->addChild('updateOwnData');

        //сохраняем роли и операции
        $auth->save();

       //$this->render('install');
    }

    public static function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}
