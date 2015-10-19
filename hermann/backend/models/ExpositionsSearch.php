<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Expositions;

/**
 * ExpositionsSearch represents the model behind the search form about `backend\models\Expositions`.
 */
class ExpositionsSearch extends Expositions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exposition_id'], 'integer'],
            [['exposition_title', 'exposition_description', 'exposition_status'], 'safe'],
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
        $query = Expositions::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'exposition_id' => $this->exposition_id,
        ]);

        $query->andFilterWhere(['like', 'exposition_title', $this->exposition_title])
            ->andFilterWhere(['like', 'exposition_description', $this->exposition_description])
            ->andFilterWhere(['like', 'exposition_status', $this->exposition_status]);

        return $dataProvider;
    }
}
