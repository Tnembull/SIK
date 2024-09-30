<?php

/** @var yii\web\View $this */
/** @var app\models\Transaction[] $transactions */

use yii\bootstrap5\Html;

$this->title = 'Transaksi';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Create Transaction', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pasien ID</th>
            <th>Tindakan ID</th>
            <th>Obat ID</th>
            <th>Tanggal</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction) : ?>
            <tr>
                <td><?= Html::encode($transaction->id) ?></td>
                <td><?= Html::encode($transaction->patient_id) ?></td>
                <td><?= Html::encode($transaction->action_id) ?></td>
                <td><?= Html::encode($transaction->medicine_id) ?></td>
                <td><?= Html::encode($transaction->date) ?></td>
                <td>
                    <?= Html::a('Update', ['update', 'id' => $transaction->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $transaction->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>