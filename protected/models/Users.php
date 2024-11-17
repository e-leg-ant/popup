<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $login
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $confirm_password
 * @property string $state
 * @property string $role * @property string $last_login
 */
class Users extends CActiveRecord
{
    const ROLE_ADMIN = 'admin';
    const ROLE_GUEST = 'guest';

    const STATE_ENABLED = 'enabled';
    const STATE_DISABLED = 'disabled';

    public $confirm_password;
    public $prev_role = null;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('login, name, state, role, password, confirm_password', 'required'),
            array('login, name, email, password, confirm_password', 'length', 'max' => 100),
            array('password', 'compare', 'compareAttribute' => 'confirm_password'),
            array('state', 'length', 'max' => 10),
            array('role', 'length', 'max' => 10),
            array('phone', 'length', 'min'=>17, 'max'=>17),
            array('last_login', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, login, name, email, state, role', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'login' => 'Логин',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'confirm_password' => 'Подтвердите пароль',
            'state' => 'Состояние',
            'role' => 'Роль',
            'close_day' => 'Закрыть день',
            'last_login' => 'Последний визит',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('close_day', $this->close_day);
        $criteria->compare('last_login', $this->last_login, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 30,
            )
        ));
    }

    /**
     * Returns all roles.
     * @return roles the static model class
     */
    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Администратор',
            self::ROLE_GUEST => 'Гость'
        ];
    }

    public static function getStateLabel($state)
    {
        $label = '';

        switch ($state) {
            case self::STATE_ENABLED:   $label = 'Активный';
            break;
            case self::STATE_DISABLED:   $label = 'Заблокирован';
            break;
        }

        return $label;
    }

    public static function getUserName($id)
    {
        $user = Users::model()->findByPk((int)$id);
        return (!empty($user->name)) ? $user->name : '';
    }

    protected function beforeSave(){
        //$this->password = md5($this->password);
        return parent::beforeSave();
    }

    public function afterSave() {
        parent::afterSave();
        //связываем нового пользователя с ролью
        $auth = Yii::app()->authManager;
        //предварительно удаляем старую связь
        $auth->revoke($this->prev_role, $this->login);
        $auth->assign($this->role, $this->login);
        $auth->save();
        return true;
    }

    public function beforeDelete() {
        parent::beforeDelete();
        //убираем связь удаленного пользователя с ролью
        $auth = Yii::app()->authManager;
        $auth->revoke($this->role, $this->login);
        $auth->save();
        return true;
    }
}