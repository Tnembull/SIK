<?php

/** @var yii\web\View $this */
/** @var array $paymentLabels */
/** @var array $paymentData */
/** @var array $userLabels */
/** @var array $userData */

use yii\bootstrap5\Html;

$this->title = 'Laporan';
?>

<h1><?= Html::encode($this->title) ?></h1>

<h2>Pembayaran</h2>
<canvas id="paymentChart" style="width:100%;max-width:600px"></canvas>

<h2>Jumlah User</h2>
<canvas id="userChart" style="width:100%;max-width:600px"></canvas>

<script>
    // Grafik Pembayaran
    const paymentLabels = <?= $paymentLabels ?>; // Ambil label dari controller
    const paymentData = {
        labels: paymentLabels,
        datasets: [{
            label: 'Pembayaran',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: <?= $paymentData ?>, // Ambil data dari controller
        }]
    };

    const paymentConfig = {
        type: 'line', // Jenis grafik: 'line', 'bar', 'pie', etc.
        data: paymentData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    const paymentChart = new Chart(
        document.getElementById('paymentChart'),
        paymentConfig
    );

    // Grafik Jumlah User
    const userLabels = <?= $userLabels ?>; // Ambil label dari controller
    const userData = {
        labels: userLabels,
        datasets: [{
            label: 'Jumlah User',
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            data: <?= $userData ?>, // Ambil data dari controller
        }]
    };

    const userConfig = {
        type: 'bar', // Jenis grafik untuk jumlah user
        data: userData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    const userChart = new Chart(
        document.getElementById('userChart'),
        userConfig
    );
</script>