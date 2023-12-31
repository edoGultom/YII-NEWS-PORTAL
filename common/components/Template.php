<?php

namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Statistik;
use common\models\NewStiker;
use common\models\Artikel;
use common\models\KategoriArtikel;
use common\models\ArsipLink;
use common\models\Unduhan;
use common\models\Slider;
use common\models\SliderItem;
use common\models\KategoriBanner;
use common\models\Menu;
use common\models\MenuKategori;
use common\models\Profil;
use common\models\RefKategori;
use common\models\Section;
use yii\helpers\ArrayHelper;

class Template extends Component
{

    public function sectionHeader($id_kategori = null)
    {
        return  Section::find()->where(['id_kategori' => $id_kategori])->orderBy(['id' => SORT_ASC])->all();
    }
    public function SliderJumbotron($id_section)
    {
        $arr = ArrayHelper::getColumn(Slider::find()->where(['id_section' => $id_section])->all(), 'id');
        // return $arr;
        return SliderItem::find()->where(['aktif' => 1])->andWhere(['IN', 'id_slider', $arr])->orderBy(['created_at' => SORT_DESC])->all();
    }
    public function sectionContent($id_kategori = null)
    {
        $data = [];
        $keterangaSection = Section::find()->innerjoinWith('secKategori')->where(['id_kategori' => $id_kategori])->orderBy(['id' => SORT_ASC])->asArray()->all();
        // return $keterangaSection;
        foreach ($keterangaSection as $key => $value) {
            $val = RefKategori::find()->select(['artikel.*'])->innerjoinWith('artikel')->where(['like', 'lower(keterangan)', strtolower($value['keterangan'])])->asArray()->all();
            $data[strtolower($value['keterangan'])]['section'] = $value;
            $data[strtolower($value['keterangan'])]['data'] = $val;
        }
        return $data;
    }
}
