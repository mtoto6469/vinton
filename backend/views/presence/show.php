<?php
$model = $dataProvider->getModels();
date_default_timezone_set("Asia/Tehran");
$session = Yii::$app->session;
if(!$session->isActive){
    $session->open();
}
$gen = new \common\components\General();

$gam = intval($timeStart);
$roz = (3600 * 24);

$model1 = new \backend\models\TblPresence();
$count = (intval($timeEnd) - intval($timeStart)) / $roz;

?>

<div class="row col-md-12  custyle">
    <table class="table table-striped custab">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>تاریخ</th>
            <th>عرض جغرافیایی</th>
            <th>طول جغرافیایی</th>
            <th>ساعت</th>
            <th class="text-center">حضور/غیاب</th>
        </tr>

        </thead>
        <?php
        $modelPro = new \backend\models\Profile();
        $modelPro = $modelPro->find()->where(['id_user' => $idUser])->andWhere(["enableview"=>1])->one();
        $timeWork = $modelPro->timeWork;
        if($timeWork == null | $timeWork ==  "0:0 0:0" | $timeWork ==  "00:00 00:00" ){
            $_SESSION['error'] .= " این کاربر ساعت شروع و اتمام کارش مشخص نیست ";
            $gen->redirectt('http://vintonface.com/admin/presence/selectuser');
            Yii::$app->response->redirect(\yii\helpers\Url::to(['presence/selectuser'], true));

        }
        if ($timeWork != null) {
            $timeWork = explode(" ", $timeWork);
            $tF = explode(":", $timeWork[0]);
            $tT = explode(":", $timeWork[1]);
            $modelPro->hurFrom = $tF[0];
            $modelPro->minFrom = $tF[1];
            $modelPro->hurTo = $tT[0];
            $modelPro->minTo = $tT[1];
        } else {
            $modelPro->hurFrom = 00;
            $modelPro->minFrom = 00;
            $modelPro->hurTo = 00;
            $modelPro->minTo = 00;
        }
        $timfr  = 0 +($modelPro-> minFrom* 60)+($modelPro-> hurFrom  * 3600);
        $timtO = 0 +($modelPro-> minTo* 60)+($modelPro-> hurTo  * 3600);
        $vagh =$timtO-$timfr;
        $timeHozor = 0;
        $timeGhaibat = 0;
        for ($i = 0; $i < $count; $i++) {
//            echo "<br />  gam = ".$gam;
//            $iop  = $gam + $roz;
//            echo "<br />  gamRoz = ".$iop  ;
            $model = $model1->find()->where(['id_user' => $idUser])->andWhere('time > :time', ['time' => ($gam)])->andWhere('time < :time1', ['time1' => ($gam + $roz)])->all();

            $gam = $gam + $roz;
            $jdf = new \common\components\jdf();


            $po = date('m/d/Y H:i:s', $gam);
            $io = explode(" ", $po);
            $ioo = explode("/", $io[0]);
            $o = $jdf->gregorianToJalali($ioo[2], $ioo[0], $ioo[1]);
            $o = $o[0] . '/' . $o[1] . '/' . $o[2];
            $hozor = 0;
            $ghaibat = 0;
            $check = 0;
            $sum = 0;
            $jame = 0;

            $jameEzafe = 0 ;

            if ($model != null) {
                foreach ($model as $value) {
                    if ($value->timeStamp != null) {
                        $timeHo = explode(" ", $value->timeStamp);
                        $timeHo = explode(":", $timeHo[1]);
                        $time = explode(" ", $value->timeStamp);
                    } else {
                        $time[1] = "00";
                        $time[0] = "00";
                        $timeHo[0] = 0;
                        $timeHo[1] = 0;
                    }

                    $timeHo = $timeHo[2] +($timeHo[1] * 60)+($timeHo[0] * 3600);
                    $timfr  = 0 +($modelPro-> minFrom* 60)+($modelPro-> hurFrom  * 3600);
                    $timtO = 0 +($modelPro-> minTo* 60)+($modelPro-> hurTo  * 3600);

                    if ($timeHo >= $timfr && $timeHo <= $timtO){
                    if ($sum == 0) {
                        $sum = $value->time;
                    }
                    ?>


                    <tr>
                        <td><?= $value->id ?></td>
                        <td><?= $value->dateIr ?></td>
                        <td><?= $value->lat ?></td>
                        <th><?= $value->lng ?></th>
                        <th><?= $time[1] ?></th>
                        <?php
                        if ($value->login) {
                            if ($check == 1) {
                                $jame = $jame + $value->time - $sum;
                            } else if ($check == 0) {
                                $ghaibat = $ghaibat + $value->time - $sum;
                            }
                            $check = 1;
                            echo '
             <td class="text-center"><span
                    class="glyphicon glyphicon-edit"></span> حضور
            ';
                        } else if ($value->logout) {

                            if ($check == 1) {
                                $ghaibat = $ghaibat + ($value->time - $sum);
                            } else if ($check == 0) {
                                $ghaibat = $ghaibat + ($value->time - $sum);
                            }

                            echo '
             <td class="text-center"><span
                    class="glyphicon glyphicon-remove"></span> غیبت
            ';

                        }

                        $sum = $value->time;
                        ?>
                        </td>
                    </tr>
                    <?php
                }else {
                        if ($value->login) {
                            if ($check == 1) {
                                $jameEzafe = $jameEzafe + $value->time - $sum;
                            }
                            $check = 1;
                        }
?>
                        <tr >
                        <td><?= $value->id ?></td>
                        <td><?= $value->dateIr ?></td>
                        <td><?= $value->lat ?></td>
                        <th><?= $value->lng ?></th>
                        <th><?= $time[1] ?></th>
<?php
                        echo '
             <td class="text-center" style="background-color: #3dc1ff"><span
                    class="glyphicon glyphicon-edit"></span> اضافه کاری
                   </td>
                    </tr>
            ';

                        $sum = $value->time;
                    }
                }

            $ghaibat = $vagh-$jame;
                        $sj = $jame % 60;
                        $mj = $jame / 60 % 60;
                        $hj = $jame / 3600 % 24;
                        $sGH = $ghaibat % 60;
                        $mGH = $ghaibat / 60 % 60;
                        $hGH = $ghaibat / 3600 % 24;
                $sEz = $jameEzafe % 60;
                $mEz = $jameEzafe / 60 % 60;
                $hEz = $jameEzafe / 3600 % 24;



                        ?>
                        <tr>
                            <td> <?= $value->dateIr ?> جمع حضور/غیاب روز</td>
                            <td>ساعات حضور</td>
                            <td style="background-color: #75ffaa"><?= $hj . ":" . $mj . ":" . $sj ?></td>
                            <td>ساعات غیبت موظفی</td>
                            <th style="background-color: #ff7580"><?= $hGH . ":" . $mGH . ":" . $sGH ?></th>
                            <td>اضافه کاری</td>
                            <th style="background-color: #3dc1ff"><?= $hEz. ":" . $mEz. ":" . $sEz ?></th>
                        </tr>
                        <?php
                        $timeHozor += $jame;
                        $timeGhaibat += $ghaibat;


            } else {
                ?>
                <tr>
                    <th>0</th>
                    <th><?= $o ?> </th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th class="text-center">غیبت</th>
                </tr>
                <?php
            }
        }
        $dGH = $timeHozor / (3600 * 24) % 30;
        $sGH = $timeHozor % 60;
        $mGH = $timeHozor / 60 % 60;
        $hGH = $timeHozor / 3600 % 24;
        ?>


    </table>


</div>


<hr/>


<div class="row   custyle">

    <table class="table table-striped custab">

        <thead>
        <tr>
            <th>شناسه</th>
            <th>از تاریخ</th>
            <th>تا تاریخ</th>
            <th>ساعت</th>
            <th>روز</th>

        </tr>

        </thead>
        <tr>
            <td>1</td>

            <td style="background-color: #75ffaa"><?= $shoedateStart ?></td>
            <td><?= $shoedateEnd ?></td>
            <th style="background-color: #ff7580"><?= $hGH . ":" . $mGH . ":" . $sGH ?></th>
            <td><?= $dGH ?></td>

        </tr>
    </table>
</div>