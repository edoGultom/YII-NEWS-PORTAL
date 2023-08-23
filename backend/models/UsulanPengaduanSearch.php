<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TaPengaduan;

/**
 * UsulanPengaduanSearch represents the model behind the search form about `common\models\TaPengaduan`.
 */
class UsulanPengaduanSearch extends TaPengaduan
{
    /**
     * @inheritdoc
     */
    public $cari;

    public function rules()
    {
        return [
            [['id', 'id_user', 'id_file'], 'integer'],
            [['tgl_pengaduan', 'subjek', 'isi', 'status'], 'safe'],
            [['cari'], 'safe'],
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
        $query = TaPengaduan::find();

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
            'or',
            ['like', 'tgl_pengaduan', strtolower($this->cari)],
            ['like', 'lower(isi)', strtolower($this->cari)],
            ['like', 'lower(subjek)', strtolower($this->cari)],
        ]);
        return $dataProvider;
    }
}
