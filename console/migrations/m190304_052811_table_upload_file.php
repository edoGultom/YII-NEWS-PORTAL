<?php

use yii\db\Migration;

/**
 * Class m190304_052811_table_upload_file
 */
class m190304_052811_table_upload_file extends Migration
{
    public function up()
    {
        $this->createTable('uploaded_file', [
            'id'                => $this->primaryKey(),
            'name'              => $this->string(),
            'filename'          => $this->string(),
            'size'              => $this->integer(),
            'type'              => $this->string()
        ]);

        // $this->batchInsert(
        //     'uploaded_file',
        //     [   
        //         'name',
        //         'filename',
        //         'size',
        //         'type'
        //     ], 
        //     [
        //         ['Koala.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\c8\57f5184d1db9df819bc08c2b782d6f_Koala.jpg', '780831', 'image/jpeg'],
        //         ['Hydrangeas.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\5c\65d257606e915167077d869ad83368_Hydrangeas.jpg', '595284', 'image/jpeg'],
        //         ['Jellyfish.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\f0\ae6a899589f3fc4dd483c1b70a7f59_Jellyfish.jpg', '775702', 'image/jpeg'],
        //         ['Tulips.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\3a\ebd9841ce4a07ed7b9ee899199e00d_Tulips.jpeg', '620888', 'image/jpeg'],
        //         ['Jellyfish.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\f0\ae6a899589f3fc4dd483c1b70a7f59_Jellyfish.jpg', '775702', 'image/jpeg'],
        //         ['Tulips.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\e6\bf89b8f500d431091110a390d60793_Tulips.jpg', '620888', 'image/jpeg'],
        //         ['Hydrangeas.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\11\b5a0ae0a8999179ee05856f524e84f_Hydrangeas.jpg', '595284', 'image/jpeg'],
        //         ['Penguins.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\2d\f67257eb69131beca6350d09b9f4b0_Penguins.jpg', '777835', 'image/jpeg'],
        //         ['Desert.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\7e\108bc51bea2efa02430becdeb9c43f_Desert.jpg', '845941', 'image/jpeg'],
        //         ['Lighthouse.jpg','C:\xampp\htdocs\Disnakerprovsu\common/upload\8e\569e13b4290cb19861e180aa349209_Lighthouse.jpg', '561276', 'image/jpeg'],
        //         ['issue.png','C:\xampp\htdocs\Disnakerprovsu\common/upload\a5\05780f034748dc4b151f6f824e3d12_issue.png', '45102', 'image/jpeg'],
        //         ['5_6170052538855850052.doc','C:\xampp\htdocs\Disnakerprovsu\common/upload\83\6d1c9adf948e3d318a44340e1220d0_5_6170052538855850052.doc', '410537', 'text/rtf']
        //     ]
        // );
        
    }

    public function down()
    {
        $this->dropTable('uploaded_file');
    }
}
