<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "catgry".
 *
 * @property integer $id
 * @property string $name
 * @property string $descript
 * @property string $added
 */
class Catgry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catgry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'descript', 'added'], 'required'],
            [['descript'], 'string'],
            [['added'], 'safe'],
            [['name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'descript' => 'Descript',
            'added' => 'Added',
        ];
    }
}
