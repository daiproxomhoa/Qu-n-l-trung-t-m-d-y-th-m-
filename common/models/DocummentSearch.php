<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Documment;

/**
 * DocummentSearch represents the model behind the search form about `common\models\Documment`.
 */
class DocummentSearch extends Documment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['document_name', 'description','content', 'link_download', 'image_name'], 'safe']
        ,
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
        $query = Documment::find();

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
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'document_name', $this->document_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'link_download', $this->link_download])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image_name', $this->image_name]);
        return $dataProvider;
    }
}
