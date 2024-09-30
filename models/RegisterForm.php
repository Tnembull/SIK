<?php

namespace app\models;

use yii\base\Model;
use app\models\User;
use Yii;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $confirm_password;

    public function rules()
    {
        return [
            [['username', 'password', 'confirm_password'], 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords don’t match.'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }
}
