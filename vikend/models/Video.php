<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $descript
 * @property string $added
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link', 'descript', 'added'], 'required'],
            [['descript'], 'string'],
            [['added'], 'safe'],
            [['title'], 'string', 'max' => 64],
            [['link'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'link' => 'Link',
            'descript' => 'Descript',
            'added' => 'Added',
        ];
    }
}
