<?php

use yii\db\Migration;
use common\models\SliderItem;
use common\models\Banner;
/**
 * Class m190404_091500_add_olum_aktif
 */
class m190404_091500_add_olum_aktif extends Migration
{
    public function up()
    {
        $this->addColumn('slider_item', 'aktif', $this->tinyInteger());
        $this->addColumn('banner', 'aktif', $this->tinyInteger());
        
        $models = SliderItem::find()->all();
        foreach ($models as $model) {
            $model->aktif = 1;
            $model->update(false);
        }

        $models2 = Banner::find()->all();
        foreach ($models2 as $model2) {
            $model2->aktif = 1;
            $model2->update(false);
        }
    }

    public function down()
    {
        $this->dropColumn('slider_item', 'aktif');
        $this->dropColumn('banner', 'aktif');
    } 
}
