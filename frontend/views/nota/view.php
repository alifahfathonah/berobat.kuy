<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;


/* @var $this yii\web\View */
/* @var $model frontend\models\Nota */

$this->title = $model->notaID;

?>
<div class="nota-view">

    <h1>Nota id <?= Html::encode($this->title) ?></h1>

    <table class="table table-hover">
        <tbody>
            <tr>
                <td> No </td>
                <td> Nama Pembayaran </td>
                <td> Quantity </td>
                <td> Harga </td>
            </tr>
            <?php 
            $i = 1;
            $notaQuery = (new Query())
                ->from('nota')
                ->where(['notaID'=>$_GET['id']]);
            foreach($notaQuery->each() as $nota){

                $verikasiPemeriksaan = (new Query())
                    ->select('count(*)')
                    ->from('pemeriksaan')
                    ->where(['pemeriksaanID'=>$nota['pemeriksaanID']]);
                foreach($verikasiPemeriksaan->each() as $verifikasiP){
                    if($verifikasiP['count(*)'] > 0){
                        $pemeriksaanQuery = (new Query())
                        ->from('pemeriksaan')
                        ->where(['pemeriksaanID'=>$nota['pemeriksaanID']]);
                    foreach($pemeriksaanQuery->each() as $pemeriksaan){
                        $jenisPeriksaQuery = (new Query())
                            ->from('jenisperiksa')
                            ->where(['jenisPeriksaID'=>$pemeriksaan['jenisPeriksaID']]);
                        foreach($jenisPeriksaQuery->each() as $jenisPeriksa){ ?>
                            <tr>
                                <td><?php echo $i; $i++;?></td>
                                <td> Pembayaran Pemeriksaan </td>
                                <td>  </td>
                                <td>Rp. <?php echo $jenisPeriksa['jenisPeriksaHarga'];?></td>
                            </tr>
                        <?php }
                        }
                    }
                }

                $verifikasiResep = (new Query())
                    ->select('count(*)')
                    ->from('detailresep')
                    ->where(['resepID'=>$nota['resepID']]);
                foreach($verifikasiResep->each() as $verikasiR){
                    if($verikasiR['count(*)'] > 0){ 
                        $resepQuery = (new Query())
                        ->from('detailresep')
                        ->where(['resepID'=>$nota['resepID']]);
                        foreach($resepQuery->each() as $resep){
                            $detailResepQuery = (new Query())
                                ->from('obat')
                                ->where(['obatID'=>$resep['obatID']]);
                            foreach($detailResepQuery->each() as $obat){?>
                            <tr>
                                <td><?php echo $i; $i++;?></td>
                                <td><?php echo $obat['obatNama'];?></td>
                                <td><?php echo $resep['detailResepQuantity'];?></td>
                                <td>Rp. <?php echo $resep['detailResepSubtotal'];?></td>
                            </tr>
                            <?php }
                        }
                    }
                } ?>
                <tr>
                    <th > Total </th>
                    <td>Rp. <?= $nota['notaTotalHarga'];?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Keterangan: </th>
                    <th class="<?php if ($nota['notaStatus'] == 'dibelum bayar'){ echo 'text-danger';}
                                else {echo 'text-success';}?>
                                ">
                       <?= $nota['notaStatus'];?>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
            </tr>
        </tfoot>
    </table>

<?= Html::a('Kembali ke list obat', ['obat/index'], ['class' => 'btn btn-success','data' => [
    'method' => 'post',],]) ?>
</div>
