<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SliderItem;

/**
 * SliderItemSearch represents the model behind the search form about `common\models\SliderItem`.
 */
class SliderItemSearch extends SliderItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_slider', 'gambar', 'id_user','aktif'], 'integer'],
            [['nama_slider', 'captions', 'created_at', 'updated_at'], 'safe'],
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
        $query = SliderItem::find();

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
            'id' => $this->id,
            'id_slider' => $this->id_slider,
            'gambar' => $this->gambar,
            'id_user' => $this->id_user,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'aktif' => $this->aktif,
        ]);

        $query->andFilterWhere(['like', 'nama_slider', $this->nama_slider])
            ->andFilterWhere(['like', 'captions', $this->captions]);

        return $dataProvider;
    }
}
