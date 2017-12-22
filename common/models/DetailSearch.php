<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Detail;

/**
 * DetailSearch represents the model behind the search form about `common\models\Detail`.
 */
class DetailSearch extends Detail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_dc'], 'integer'],
            [['header', 'content1', 'image_name', 'content2', 'content3', 'content4', 'content5'], 'safe'],
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
        $query = Detail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_dc' => $this->id_dc,
        ]);

        $query->andFilterWhere(['like', 'Tiêu đề', $this->header])
            ->andFilterWhere(['like', 'Lời giới thiệu', $this->content1])
            ->andFilterWhere(['like', 'Image Name', $this->image_name])
            ->andFilterWhere(['like', 'Khuyến mãi', $this->content2])
            ->andFilterWhere(['like', 'list1', $this->content3])
            ->andFilterWhere(['like', 'list2', $this->content4])
            ->andFilterWhere(['like', 'list3', $this->content5]);

        return $dataProvider;
    }
}
