<?php

/** @var yii\web\View $this */
/** @var app\models\Payment[] $payments */

use yii\bootstrap5\Html;

$this->title = 'Pembayaran';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Create Payment', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Transaction ID</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($payments as $payment) : ?>
            <tr>
                <td><?= Html::encode($payment->id) ?></td>
                <td><?= Html::encode($payment->transaction_id) ?></td>
                <td><?= Html::encode($payment->amount) ?></td>
                <td><?= Html::encode($payment->date) ?></td>
                <td>
                    <?= Html::a('Update', ['update', 'id' => $payment->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $payment->id], [
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