<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expositions".
 *
 * @property integer $exposition_id
 * @property string $exposition_title
 * @property string $exposition_description
 * @property string $exposition_status
 *
 * @property Objects[] $objects
 */
class Expositions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'expositions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exposition_title', 'exposition_description', 'exposition_status'], 'required'],
            [['exposition_description', 'exposition_status'], 'string'],
            [['file'], 'file'],
            [['exposition_title', 'exposition_image'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'exposition_id' => 'ID',
            'exposition_title' => 'Titre',
            'exposition_description' => ' Description',
            'file' => 'Image',
            'exposition_status' => 'Statut',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjects()
    {
        return $this->hasMany(Objects::className(), ['expositions_exposition_id' => 'exposition_id']);
    }
}
