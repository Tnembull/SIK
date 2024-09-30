<?php

/** @var yii\web\View $this */
/** @var app\models\Transaction $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Update Transaction: ' . $model->id;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>
    <?= $form->field($model, 'action_id')->textInput() ?>
    <?= $form->field($model, 'medicine_id')->textInput() ?>
    <?= $form->field($model, 'date')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>