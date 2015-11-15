<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string $pswd
 * @property string $added
 */
class User extends \yii\db\ActiveRecord
    implements \yii\web\IdentityInterface
{
    /**
     * @variables
     */
    
    private $authKey;
    private $accessToken;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'email', 'pswd'], 'required'], [['added'], 'safe'],
            [['fname', 'lname'], 'string', 'max' => 16], [['email'], 'email'],
            [['email'], 'string', 'max' => 48],  
            [['pswd'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'email' => 'Email',
            'pswd' => 'Pswd',
            'added' => 'Added',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = User::find()->all();

        foreach ($users as $user) {
            if ($user->accessToken === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        $users = User::find()->all();

        foreach ($users as $user) {
            if (strcasecmp($user->email, $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()
            ->validatePassword($password, $this->pswd);
        // return $this->pswd === $password;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
}
