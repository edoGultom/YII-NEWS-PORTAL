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




class Template extends Component
{

    public function Sticker()
    {
        return NewStiker::find()->where(['aktif' => 1])->orderBy(['id' => SORT_ASC])->all();
    }

    public function Artikel4()
    {
        return  Artikel::find()->orderBy(['id' => SORT_DESC])->limit(4)->all();
    }

    public function Artikel()
    {
        return  Artikel::find()->all();
    }

    public function ArsipLink()
    {
        return  ArsipLink::find()->all();
    }

    public function Unduhan()
    {
        return Unduhan::find()->all();
    }

    public function Slider()
    {
        return Slider::find()->where(['nama_slider' => 'Umum', 'status' => 1])->one();
    }

    public function SliderItemTanpaKategori()
    {
        return SliderItem::find()->where(['aktif' => 1])->orderBy(['created_at' => SORT_DESC])->all();
    }


    public function BanerSamping()
    {
        return KategoriBanner::find()->where(['nama_banner' => 'Banner Sidebar Home'])->one();
    }

    public function BanerHeader()
    {
        return KategoriBanner::find()->where(['nama_banner' => 'Banner Header'])->one();
    }

    public function LinkTerkait()
    {
        return KategoriBanner::find()->where(['nama_banner' => 'Link Terkait'])->one();
    }

    public function BanerBawah()
    {
        return KategoriBanner::find()->where(['nama_banner' => 'Banner Bawah'])->one();
    }


    public function KategoriArtikel()
    {
        return KategoriArtikel::find()->all();
    }

    public function Statistik()
    {

        $ip  = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
        $tanggal = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $week = date('m');
        $waktu   = time(); //
        $bln = date("m");
        $tgl = date("d");
        $blan = date("Y-m");
        $thn = date("Y");
        $tglk = $tgl - 1;

        //Hit Minggu//
        $n = date('N');
        $t = date('Y-m-d');
        $nd = $n - 1;
        $dw = mktime(0, 0, 0, date("m"), date("d") - $nd,   date("Y"));
        $tw = date('Y-m-d', $dw);

        $s = Statistik::find()->where(['ip' => $ip])->andWhere(['tanggal' => $tanggal])->one();
        // Kalau belum ada, simpan data user tersebut ke database
        if ($s) {
            $s->hits = $s->hits + 1;
            $s->online = $waktu;
            $s->save(false);
        } else {
            $s      = new Statistik();
            $s->ip  = $ip;
            $s->tanggal = $tanggal;
            $s->hits = 1;
            $s->online = $waktu;
            $s->save(false);
        }
    }

    public function MenuAtas()
    {
        $MenuKategori = MenuKategori::find()->where(['keterangan' => 'Menu Atas'])->one();
        return Menu::find()->where(['id_induk' => Null, 'id_kategori' => $MenuKategori ? $MenuKategori->id_menu_kategori : 0])->orderBy(['id_menu' => SORT_ASC])->all();
    }
    public function MenuScroll()
    {
        $MenuKategori = MenuKategori::find()->where(['keterangan' => 'Menu Scroll'])->one();
        return Menu::find()->where(['id_induk' => Null, 'id_kategori' => $MenuKategori ? $MenuKategori->id_menu_kategori : 0])->orderBy(['id_menu' => SORT_ASC])->all();
    }

    public function Logo()
    {
        return Profil::find()->one();
    }

    public function MenuUtama()
    {
        $MenuKategori = MenuKategori::find()->where(['keterangan' => 'Menu Utama'])->one();
        return Menu::find()->where(['id_induk' => Null, 'id_kategori' => $MenuKategori ? $MenuKategori->id_menu_kategori : 0])->orderBy(['id_menu' => SORT_ASC])->all();
    }

    public function MenuBawah()
    {
        $MenuKategori = MenuKategori::find()->where(['keterangan' => 'Menu Bawah'])->one();
        return Menu::find()->where(['id_induk' => Null, 'id_kategori' => 2])->orderBy(['id_menu' => SORT_ASC])->all();
    }

    public function countArtikelWithCondition($keterangan)
    {
        $kategori = KategoriArtikel::find()->where(['keterangan' => $keterangan])->one();
        if ($kategori) {
            return Artikel::find()->where(['kategori' => $kategori->id])->count();
        } else {
            return 0;
        }
    }

    public function KategoriInfo()
    {
        $kategoriInfo = KategoriArtikel::find()->where(
            ['keterangan' => 'Berita'],

        )->one()->id;
        // var_dump($kategoriInfo);
        // exit;
        return Artikel::find()->where(['aktif' => 1, 'kategori' => $kategoriInfo])->orderBy(['created_at' => SORT_DESC])->limit(4)->all();
    }

    public function Populer()
    {
        return Artikel::find()->where(['aktif' => 1])->orderBy(['jumlah_visit' => SORT_DESC])->limit(4)->all();
    }

    public function bulanIndonesia($id)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        return $bulan[$id];
    }

    public function getJumlahArtikelBulanan($bulan)
    {
        $jumlah = Yii::$app->db->createCommand("SELECT COUNT(*) FROM artikel
        WHERE to_char(to_timestamp(created_at), 'yyyy-mm') = '2020-" . $bulan . "'")->queryOne();

        return $jumlah['count'];
    }

    public function Link($string)
    {
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        $link = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), str_replace($a, $b, $string)));
        return $link;
    }
    public function http_request()
    {
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, 'https://graph.instagram.com/me/media?fields=media_url&access_token=IGQVJVVmkxZAjRtcENQOUp1Y0dmM0JVUG83dGxFZAVJWVS1ScE12VE1ITGt3ZAUlmQ1hfa25jS3RQYmFZAXzNhNXl2a0FNMHlxSDlSTUF3NXdYZAzFCb1I1SW9MSGZAKZAURNaTFCc3VkcG5ZAUUVKeHp4RHNWXwZDZD');

        // set user agent
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // tutup curl
        curl_close($ch);

        // mengembalikan hasil curl
        return $output;
    }
}
