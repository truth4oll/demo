<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Books;

/**
 * BooksSearch represents the model behind the search form about `common\models\Books`.
 */
class BooksSearch extends Books
{

    public $date_from;

    public $date_to;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_create', 'date_update', 'author_id'], 'integer'],
            [['date','date_from','date_to'], 'safe'],
            [['name', 'preview'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Books::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);


        //prepare dates
        if ($this->date_from && $date = \DateTime::createFromFormat ( 'd/m/Y' , $this->date_from)){
            $this->date_from = $date->format('Y-m-d');
        }else{
            $this->date_from = '';
        }
        if ($this->date_to && $date = \DateTime::createFromFormat ( 'd/m/Y' , $this->date_to)){
            $this->date_to = $date->format('Y-m-d');
        }else{
            $this->date_to = '';
        }





        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'author_id' => $this->author_id,
        ])->andFilterWhere(['>=','date',$this->date_from])
            ->andFilterWhere(['<=','date',$this->date_to]);

        $query->andFilterWhere(['like', 'name', $this->name]);


        return $dataProvider;
    }



}
