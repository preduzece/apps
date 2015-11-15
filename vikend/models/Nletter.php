<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nletter".
 *
 * @property integer $id
 * @property string $email
 * @property string $created
 */
class Nletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['created'], 'safe'], [['email'], 'email'],
            [['email'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'created' => 'Created',
        ];
    }
}
