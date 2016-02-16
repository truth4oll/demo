<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Имя автора',
            'lastname' => 'Фамилия автора',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks(){
        return $this->hasMany(Books::className(),['author_id'=>'id']);
    }

    public function getFullName(){
        return $this->firstname.' '.$this->lastname;
    }

}
