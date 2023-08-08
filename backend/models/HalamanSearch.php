<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Halaman;

/**
 * HalamanSearch represents the model behind the search form about `common\models\Halaman`.
 */
class HalamanSearch extends Halaman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'format_halaman', 'id_user', 'status', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'judul', 'sub_judul', 'isi'], 'safe'],
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
        $query = Halaman::find();

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
            'format_halaman' => $this->format_halaman,
            'id_user' => $this->id_user,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'sub_judul', $this->sub_judul])
            ->andFilterWhere(['like', 'isi', $this->isi]);

        return $dataProvider;
    }
}
