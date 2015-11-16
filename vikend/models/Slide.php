<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slide".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $link
 * @property string $created
 */
class Slide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image', 'link', 'priority', 'created'], 'required'],
            [['image', 'link'], 'string', 'max' => 64],
            [['title'], 'string', 'max' => 32],
            [['priority'], 'integer'],
            [['created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'title' => 'Title',
            'image' => 'Image',
            'priority' => 'Priority',
            'created' => 'Created',
        ];
    }
}
