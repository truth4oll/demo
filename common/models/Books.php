<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property integer $date_create
 * @property integer $date_update
 * @property string $preview
 * @property integer $date
 * @property integer $author_id
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_create', 'date_update',  'author_id'], 'integer'],
            [['date'], 'safe'],
            [['name', 'preview'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название книги',
            'date_create' => 'Дата создания записи',
            'date_update' => 'Дата обновления записи',
            'preview' => 'Изображение',
            'date' => 'Дата выхода',
            'author_id' => 'Автор',
        ];
    }

    public function getAuthor(){
        return $this->hasOne(Authors::className(),['id'=>'author_id']);
    }
}
