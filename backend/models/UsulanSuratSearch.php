<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TaPengusulanSurat;

/**
 * UsulanSuratSearch represents the model behind the search form about `common\models\TaPengusulanSurat`.
 */
class UsulanSuratSearch extends TaPengusulanSurat
{
    /**
     * @inheritdoc
     */
    public $name;

    public function rules()
    {
        return [
            [['id', 'id_jenis_surat', 'id_user'], 'integer'],
            [['jenis_surat', 'tanggal', 'id_file', 'keterangan', 'status', 'name'], 'safe'],
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
        $query = TaPengusulanSurat::find()
            ->innerJoinWith('user');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // echo "<pre>";
        // print_r($this->tanggal);
        // echo "</pre>";
        // exit();
        $query->andFilterWhere(['like', 'jenis_surat', $this->jenis_surat])
            ->andFilterWhere(['like', 'id_file', $this->id_file])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like',  new \yii\db\Expression('DATE_FORMAT(tanggal, "%d.%m.%Y")'), $this->tanggal])
            ->andFilterWhere(['like', 'lower(user.name)', strtolower($this->name)]);

        return $dataProvider;
    }
}
