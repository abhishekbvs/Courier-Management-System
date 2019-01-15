<?php
namespace app\models;

use yii\base\Model;
use app\models\User;
use yii\rbac\DbManager;
use Yii;
/**
 * Signup form
 */
class UserForm extends Model
{
    public $id;
    public $username;
    public $password;
    public $rolename;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['rolename', 'required'],
            ['rolename', 'string'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password'=>'Password',
            'rolename' => 'Rolename',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function createUser()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user = $user->save() ? $user : null;
        $auth = new DbManager;
        $auth->init();
        $role = $auth->getRole($this->rolename);
        $auth->assign($role, $user->id);
        return $user;
      }
      public function updateUser($user)
      {
          $this->id = $user->id;
          $this->username = $user->username;
      }
      public function updateChange($user)
      {
          $user->username = $this->username;
          $user->setPassword($this->password);
          $user->generateAuthKey();
          return $user->save() ? $user : null;
      }
}
