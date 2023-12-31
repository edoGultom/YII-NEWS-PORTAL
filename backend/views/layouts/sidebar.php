<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Menu;

?>

        <?php
        $menuItems = [];
        $menuItems[] = [
            'label' => 'Main Menu',
            'options' => ['class' => 'menu-header']
        ];

        $menuItems[] = [
            'label' => '<i class="fas fa-table-cells-large"></i><span>All Section</span>',
            'options' => ['class' => (in_array(Yii::$app->controller->id, ['section', 'section-kategori'])) ? 'dropdown active' : 'nav-item dropdown'],
            'template' => '<a href="{url}" class="nav-link has-dropdown" aria-expanded="false">{label}</a>',
            'url' => "#",
            'items' => [
                [
                    'label' => 'Section Kategori',
                    'url' => ['/section-kategori'],
                    'options' => ['class' => (Yii::$app->controller->id == 'section-kategori') ? 'active' : ''],
                    'template' => '<a href="{url}" class="nav-link">{label}</a>',
                ],
                [
                    'label' => 'Section',
                    'url' => ['/section'],
                    'options' => ['class' => (Yii::$app->controller->id == 'section') ? 'active' : ''],
                    'template' => '<a href="{url}" class="nav-link">{label}</a>',
                ],

            ],
        ];
        $menuItems[] = [
            'label' => '<i class="fas fa-table-cells-large"></i><span>Berita</span>',
            'options' => ['class' => (in_array(Yii::$app->controller->id, ['halaman', 'artikel', 'kategori-artikel'])) ? 'dropdown active' : 'nav-item dropdown'],
            'template' => '<a href="{url}" class="nav-link has-dropdown" aria-expanded="false">{label}</a>',
            'url' => "#",
            'items' => [
                // [
                //     'label' => 'Halaman',
                //     'url' => ['/halaman'],
                //     'options' => ['class' => (Yii::$app->controller->id == 'halaman') ? 'active' : ''],
                //     'template' => '<a href="{url}" class="nav-link">{label}</a>',
                // ],
                [
                    'label' => 'Kategori',
                    'url' => ['/kategori-artikel'],
                    'options' => ['class' => (Yii::$app->controller->id == 'kategori-artikel') ? 'active' : ''],
                    'template' => '<a href="{url}" class="nav-link">{label}</a>',
                ],
                [
                    'label' => 'Artikel',
                    'url' => ['/artikel'],
                    'options' => ['class' => (Yii::$app->controller->id == 'artikel') ? 'active' : ''],
                    'template' => '<a href="{url}" class="nav-link">{label}</a>',
                ],
            ],
        ];
        $menuItems[] = [
            'label' => '<i class="fas fa-image"></i><span>Gambar</span>',
            'options' => ['class' => (in_array(Yii::$app->controller->id, ['slider', 'slider-item'])) ? 'dropdown active' : 'nav-item dropdown'],
            'template' => '<a href="{url}" class="nav-link has-dropdown" aria-expanded="false">{label}</a>',
            'url' => "#",
            'items' => [
                [
                    'label' => 'Slider',
                    'url' => ['/slider'],
                    'options' => ['class' => (Yii::$app->controller->id == 'slider') ? 'active' : ''],
                    'template' => '<a href="{url}" class="nav-link">{label}</a>',
                ],
                [
                    'label' => 'Slider Item',
                    'url' => ['/slider-item'],
                    'options' => ['class' => (Yii::$app->controller->id == 'slider-item') ? 'active' : ''],
                    'template' => '<a href="{url}" class="nav-link">{label}</a>',
                ],
            ],
        ];
        $menuItems[] = [
            'label' => '<i class="fa-solid fa-envelope-circle-check m-0"></i><span>Usulan Surat</span>',
            'options' => ['class' =>  Yii::$app->controller->id == 'usulan-surat' ? 'nav-item active' : 'nav-item'],
            'url' => ['/usulan-surat/index']
        ];
        $menuItems[] = [
            'label' => '<i class="fa-solid fa-comments m-0"></i><span>Pengaduan Masyarakat</span>',
            'options' => ['class' =>  Yii::$app->controller->id == 'usulan-pengaduan' ? 'nav-item active' : 'nav-item'],
            'url' => ['/usulan-pengaduan/index']
        ];
        $menuItems[] = [
            'label' => '<i class="fa-solid fa-users m-0"></i><span>Pengguna</span>',
            'options' => ['class' =>  Yii::$app->controller->id == 'pengguna' ? 'nav-item active' : 'nav-item'],
            'url' => ['/pengguna']
        ];

        echo Menu::widget([
            'items' => $menuItems,
            'activateItems' => true,
            'activateParents' => false,
            'activeCssClass' => 'active',
            'options' => ['class' => 'sidebar-menu'],
            'itemOptions' => ['class' => 'nav-link'],
            'encodeLabels' => false,
            'submenuTemplate' => '<ul class="dropdown-menu">{items}</ul>',
            'activateParents' => true,
            // 'firstItemCssClass' => 'first-menu'

        ]);
        ?>
   