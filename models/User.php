<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    //public $authKey;
    public $auth_key;
    //public $accessToken;
    public $access_token;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = \app\models\tables\User::findOne($id);
        if ($user) {
            return new User($user->getAttributes());
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = \app\models\tables\User::findOne(['access_token' => $token]);
        if ($user) {
            return new User($user->getAttributes());
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return User
     */
    public static function findByUsername($username)
    {
        $user = \app\models\tables\User::findOne(['username' => $username]);
        if ($user) {
            return new User($user->getAttributes());
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
