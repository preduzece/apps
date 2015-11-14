<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Objects;

/**
 * ObjectsSearch represents the model behind the search form about `backend\models\Objects`.
 */
class ObjectsSearch extends Objects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_id', 'expositions_exposition_id'], 'integer'],
            [['object_title', 'object_description', 'object_link', 'object_image', 'object_created_date'], 'safe'],
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
        $query = Objects::find()->orderby('object_created_date desc');

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
            'object_id' => $this->object_id,
            'expositions_exposition_id' => $this->expositions_exposition_id,
            'object_created_date' => $this->object_created_date,
        ]);

        $query->andFilterWhere(['like', 'object_title', $this->object_title])
            ->andFilterWhere(['like', 'object_description', $this->object_description])
            ->andFilterWhere(['like', 'object_link', $this->object_link])
            ->andFilterWhere(['like', 'object_image', $this->object_image]);

        return $dataProvider;
    }
}
