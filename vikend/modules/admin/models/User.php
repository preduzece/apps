<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $role
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string $pswd
 * @property string $added
 */
class User extends \yii\db\ActiveRecord
{
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
            [['role', 'fname', 'lname', 'email', 'pswd', 'added'], 'required'],
            [['role'], 'integer'],
            [['added'], 'safe'],
            [['fname', 'lname'], 'string', 'max' => 16],
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
            'role' => 'Role',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'email' => 'Email',
            'pswd' => 'Pswd',
            'added' => 'Added',
        ];
    }
}
