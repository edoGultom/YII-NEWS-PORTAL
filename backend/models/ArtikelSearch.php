<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Artikel;

/**
 * ArtikelSearch represents the model behind the search form about `common\models\Artikel`.
 */
class ArtikelSearch extends Artikel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kategori', 'gambar', 'gambart_thumbnail', 'id_user', 'created_at', 'updated_at'], 'integer'],
            [['judul', 'sub_judul', 'baru', 'aktif', 'isi', 'keterangan_gambar', 'tag'], 'safe'],
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
        
        $query = Artikel::find()->orderBy(["created_at" => SORT_DESC]);

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
            'kategori' => $this->kategori,
            'gambar' => $this->gambar,
            'gambart_thumbnail' => $this->gambart_thumbnail,
            'id_user' => $this->id_user,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'judul', $this->judul])
            ->andFilterWhere(['like', 'baru', $this->baru])
            ->andFilterWhere(['like', 'aktif', $this->aktif])
            ->andFilterWhere(['like', 'isi', $this->isi])
            ->andFilterWhere(['like', 'keterangan_gambar', $this->keterangan_gambar])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
