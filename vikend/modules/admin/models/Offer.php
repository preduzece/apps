<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "offer".
 *
 * @property integer $id
 * @property string $name
 * @property integer $email
 * @property string $phone
 * @property string $website
 * @property integer $catgry
 * @property string $image
 * @property string $descript
 * @property integer $location
 * @property string $priority
 * @property string $expires
 * @property string $added
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'priority', 'website', 'catgry', 'descript', 'expires', 'added'], 'required'],
            [['image'], 'file', 'extensions' => 'gif, jpg, png', 'skipOnEmpty' => true],
            [['catgry', 'priority'], 'integer'], [['added', 'expires'], 'safe'],
            [['descript'], 'string'], [['phone'], 'string', 'max' => 16],
            [['email', 'image', 'location'], 'string', 'max' => 32],
            [['name', 'website'], 'string', 'max' => 64],
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
            'email' => 'Email',
            'phone' => 'Phone',
            'website' => 'Website',
            'catgry' => 'Catgry',
            'image' => 'Image',
            'priority' => 'Priority',
            'expires' => 'Expires',
            'descript' => 'Descript',
            'location' => 'Location',
            'added' => 'Added',
        ];
    }

    function getCategory(){
        return $this->hasOne(Catgry::className(), ['id' => 'catgry']);
    }

}
