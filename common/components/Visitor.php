<?php
namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Statistik;

class Visitor extends Component {

    public  function Getvisitor()
    {
         // Statistik user
       
        // $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
        return $totalpengunjung = Statistik::find()->count();
    }

    public function Hariini()
    {
        $tanggal = date("Y-m-d"); // Mendapatkan tanggal sekarang
         // $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
         return $pengunjung = Statistik::find()->where(['tanggal'=>$tanggal])->groupBy(['ip','id'])->count();
    }

    public function Kemarin()
    {

        $tanggal = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
        $kemarin = Statistik::find()->where(['tanggal'=>$tanggal]);
        
        return $kemarin1 = $kemarin->count();
    }

    public function Mingguini()
    {
       
        
        $n=date('N');
        $t=date('Y-m-d');
        $nd=$n-1;
        $dw = mktime(0, 0, 0, date("m"), date("d")-$nd,   date("Y"));
        $tw=date('Y-m-d', $dw);

        return $cminggu = Statistik::find()->where(['<=','tanggal',$t])
                                    ->andWhere(['>=','tanggal',$tw])->count();
    }

    public function Bulanini()
    {
        $blan= date("m");
        $tahun = date("Y");
        return $bulan1 = Statistik::find()->where(['EXTRACT(MONTH FROM tanggal)'=>$blan])
                                        ->andWhere(['EXTRACT(YEAR FROM tanggal)'=>$tahun])
                                        ->count();
    }

    public function Tahunini()
    {
        $thn=date("Y");
        // return $tahunini1 = Statistik::find()->where(['EXTRACT(YEAR FROM tanggal)'=>$thn])->groupBy(['ip','id'])->count();
        // return $tahunini1;
        $tahunini1 = Statistik::find()->where(['EXTRACT(YEAR FROM tanggal)'=>$thn])->orderBy('ip')->all();
        $tampung = "";
        $jumlah=0;
        foreach ($tahunini1 as $item) {
            if ($item->ip == $tampung){
                
            }else{
                $jumlah++;
                $tampung = $item->ip;
            }
        }
        return $jumlah;  
    }

    public function Total()
    {
        // $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
        return $totalhits = Statistik::find()->sum('hits');
    }
    public function Hitscount()
    {
         // $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
         $tanggal = date("Y-m-d"); // Mendapatkan tanggal sekarang

         return $hits = Statistik::find()->where(['tanggal'=>$tanggal])->groupBy('id','tanggal')->sum('hits');

    }

    public function Nowonline()
    {
        $bataswaktu       = time() - 300;
        // $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
        return $pengunjungonline = Statistik::find()->where(['>','online',$bataswaktu])->count();
    }

}
?>