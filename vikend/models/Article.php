<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $image
 * @property string $author
 * @property integer $published
 * @property string $created
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'image', 'author', 'published', 'created'], 'required'],
            [['text'], 'string'],
            [['published'], 'integer'],
            [['created'], 'safe'],
            [['title', 'author'], 'string', 'max' => 32],
            [['image'], 'string', 'max' => 64]
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
            'text' => 'Text',
            'image' => 'Image',
            'author' => 'Author',
            'published' => 'Published',
            'created' => 'Created',
        ];
    }
}
