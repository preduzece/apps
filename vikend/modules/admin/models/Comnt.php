<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "comnt".
 *
 * @property integer $id
 * @property integer $user
 * @property integer $offer
 * @property string $text
 * @property string $added
 */
class Comnt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comnt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'offer', 'text', 'added'], 'required'],
            [['user', 'offer'], 'integer'],
            [['text'], 'string'],
            [['added'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'offer' => 'Offer',
            'text' => 'Text',
            'added' => 'Added',
        ];
    }
}
