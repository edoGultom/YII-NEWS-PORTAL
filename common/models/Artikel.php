<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
use yii\behaviors\SluggableBehavior;
use common\models\KategoriArtikel;
use yii\db\Expression;

/**
 * This is the model class for table "artikel".
 *
 * @property int $id
 * @property string $judul
 * @property string $sub_judul
 * @property int $kategori
 * @property int $baru
 * @property int $aktif
 * @property string $isi
 * @property int $gambar
 * @property int $gambart_thumbnail
 * @property string $keterangan_gambar
 * @property string $tag
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public $tanggalF;
    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori', 'baru', 'popular', 'aktif', 'gambar', 'gambart_thumbnail', 'id_user', 'created_at', 'updated_at', 'jumlah_visit'], 'integer'],
            [['isi', 'keterangan_gambar'], 'string'],
            [['judul', 'sub_judul', 'tag'], 'string', 'max' => 255],
            [['judul'], 'required', 'message' => 'Judul tidak boleh kosong.'],
            [['kategori'], 'required', 'message' => 'Kategori tidak boleh kosong.'],
            ['judul', 'unique', 'targetAttribute' => 'judul', 'message' => 'Judul sudah pernah digunakan.'],
            [['tanggalF'], 'safe']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'sub_judul' => 'Sub Judul',
            'kategori' => 'Kategori',
            'baru' => 'Baru',
            'aktif' => 'Aktif',
            'isi' => 'Isi',
            'gambar' => 'Gambar',
            'gambart_thumbnail' => 'Gambart Thumbnail',
            'keterangan_gambar' => 'Keterangan Gambar',
            'tag' => 'Tag',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'jumlah_visit' => 'Jumlah Visit',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            UserBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'judul',
                'slugAttribute' => 'sub_judul',
            ],
        ];
    }

    public function deleteImage()
    {
        $gambar = UploadedFiledb::findOne($this->gambar);
        $thumbnail = UploadedFiledb::findOne($this->gambart_thumbnail);

        if ($gambar && $thumbnail) {
            if (file_exists($gambar->filename) && file_exists($thumbnail->filename)) {
                if (unlink($gambar->filename) && unlink($thumbnail->filename)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public function getTanggal()
    {
        $this->created_at = date('Y-m-d');
        return $this->created_at;
        $query =  Artikel::find()
            ->where(['MONTH(created_at)' => $this->created_at])
            ->where(['YEAR(created_at)' => $this->created_at])
            ->count();
        return $query;
    }

    public function getKategoriArtikel()
    {
        return $this->hasOne(RefKategori::className(), ['id' => 'kategori']);
    }

    public function getPostingBy()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getAmbilgambar()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'gambar']);
    }
    public function getAmbilgambarthumbnail()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'gambart_thumbnail']);
    }

    public function getHeadlineArtikel()
    {
        $headline_articles = Artikel::find()->where(['like', 'tag', 'headline'])->andWhere(['aktif' => 1])->orderBy(["id" => SORT_DESC])->all();
        return $headline_articles;
    }

    public function getArtikelUtama()
    {
        $query = Artikel::find()->where(['like', 'tag', 'headline_utama'])->andWhere(['aktif' => 1])->orderBy(["id" => SORT_DESC])->one();
        return $query;
    }

    public function getArtikelPertama()
    {
        $query = Artikel::find()->where(['like', 'tag', 'headline1'])->andWhere(['aktif' => 1])->orderBy(["id" => SORT_DESC])->one();
        return $query;
    }

    public function getArtikelKedua()
    {
        $query = Artikel::find()->where(['like', 'tag', 'headline2'])->andWhere(['aktif' => 1])->orderBy(["id" => SORT_DESC])->one();
        return $query;
    }

    public function getArtikelKetiga()
    {
        $query = Artikel::find()->where(['like', 'tag', 'headline3'])->andWhere(['aktif' => 1])->orderBy(["id" => SORT_DESC])->one();
        return $query;
    }

    public function getArtikelKeempat()
    {
        $query = Artikel::find()->where(['like', 'tag', 'headline4'])->andWhere(['aktif' => 1])->orderBy(["id" => SORT_DESC])->one();
        return $query;
    }

    public function getArtikelSumut()
    {
        $get_sumut_category = KategoriArtikel::find()->where(['keterangan' => 'Sumut'])->one();
        $sumut_articles = Artikel::find()->where(['kategori' => $get_sumut_category->id])->andWhere(['aktif' => 1])->limit(8)->orderBy(["id" => SORT_DESC])->all();
        return $sumut_articles;
    }

    public function getArtikelBaru($limit)
    {
        $recent_news = Artikel::find()->limit($limit)->orderBy(['id' => SORT_DESC])->where(['aktif' => 1])->all();
        return $recent_news;
    }

    public function getArtikelTerbaru()
    {
        $lastest_news = Artikel::find()->orderBy(['id' => SORT_DESC])->where(['aktif' => 1])->one();
        return $lastest_news;
    }

    public function getArtikelRagam()
    {
        $ragam_articles = Artikel::find()->orderBy(new Expression('random()'))->limit(4)->where(['aktif' => 1])->all();
        return $ragam_articles;
    }

    public function getArtikelEkonomiBisnis()
    {
        $get_ekonomi_bisnis_articles = KategoriArtikel::find()->where(['keterangan' => 'Ekonomi Bisnis'])->one();
        $ekonomi_bisnis_articles = Artikel::find()->where(['kategori' => $get_ekonomi_bisnis_articles->id])->limit(5)->orderBy(["id" => SORT_DESC])->all();
        return $ekonomi_bisnis_articles;
    }

    public function getTags($tag)
    {
        $tags = explode(",", $tag);
        return $tags;
    }

    public function getArtikelSelanjutnya($id)
    {
        $next_news = Artikel::find()->where(['id' => $id + 1])->andWhere(['aktif' => 1])->one();
        return $next_news;
    }

    public function getArtikelSebelumnya($id)
    {
        $prev_news = Artikel::find()->where(['id' => $id - 1])->andWhere(['aktif' => 1])->one();
        return $prev_news;
    }

    public function getDaftarArtikel($kategori_id)
    {
        $query = Artikel::find()->where(['kategori' => $kategori_id])->andWhere(['aktif' => 1])->orderby(["created_at" => SORT_DESC]);
        return $query;
    }

    public function getJenisKategori($kategori)
    {
        $query = KategoriArtikel::find()->where(['keterangan' => $kategori])->one();
        return $query;
    }

    public function reduceArray($v1, $v2)
    {
        return $v1 . "-" . $v2;
    }

    public function getAllTags()
    {
        $articles = Artikel::find()->where(['aktif' => 1])->all();
        $all_tags = [];
        if (count($articles) > 0) {
            foreach ($articles as $article) {
                if ($article->tag !== "" && $article->tag !== " " && $article->tag !== null) {
                    array_push($all_tags, $article->tag);
                }
            }
        }

        $implode_tags = implode(",", $all_tags);
        $explode_tags = explode(",", $implode_tags);
        $unique_tags = array_unique($explode_tags);
        $count_value = array_count_values($explode_tags);
        $tags = arsort($count_value);
        return $count_value;
    }

    public function getMostViewedPosts()
    {
        $query = Artikel::find()->orderBy(["jumlah_visit" => SORT_DESC]);
        return $query;
    }

    public function getCariArtikel($cari)
    {
        $query = Artikel::find()->where(['ilike', 'judul', $cari])->orWhere(['ilike', 'isi', $cari])->orderBy(['created_at' => SORT_DESC]);
        return $query;
    }
}
