<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "objects".
 *
 * @property integer $object_id
 * @property string $object_title
 * @property string $object_description
 * @property string $object_link
 * @property integer $expositions_exposition_id
 * @property string $object_created_date
 *
 * @property Expositions $expositionsExposition
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public static function tableName()
    {
        return 'objects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_title', 'object_description', 'object_link', 'expositions_exposition_id', 'object_created_date'], 'required'],
            [['object_description'], 'string'],
            [['expositions_exposition_id'], 'integer'],
            [['object_created_date'], 'safe'],
            [['file'], 'file'],
            [['object_title', 'object_link', 'object_image'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'object_id' => 'Object ID',
            'object_title' => 'Object Title',
            'object_description' => 'Object Description',
            'object_link' => 'Object Link',
            'file' => 'Object Image',
            'expositions_exposition_id' => 'Expositions Exposition ID',
            'object_created_date' => 'Object Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpositionsExposition()
    {
        return $this->hasOne(Expositions::className(), ['exposition_id' => 'expositions_exposition_id']);
    }

    public function getImageurl()
    {
        $path = Yii::getAlias('@anyname') .'/';
        return $path.$this->object_image;
    }
}
