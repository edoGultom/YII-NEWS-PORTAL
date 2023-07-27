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
use common\models\Section;

class Template extends Component
{

    public function sectionHeader($id_kategori = null)
    {
        return  Section::find()->where(['id_kategori' => $id_kategori])->orderBy(['id' => SORT_ASC])->all();
    }
}
