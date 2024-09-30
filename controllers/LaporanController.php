<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Payment; // Model untuk laporan pembayaran
use app\models\User;    // Model untuk laporan pengguna

class LaporanController extends Controller
{
    public function actionIndex()
    {
        // Ambil data pembayaran dari database
        $payments = Payment::find()->all();

        // Proses data untuk grafik pembayaran
        $paymentLabels = [];
        $paymentData = [];
        foreach ($payments as $payment) {
            $paymentLabels[] = $payment->date; // Menggunakan tanggal sebagai label
            $paymentData[] = (float)$payment->amount; // Menggunakan jumlah sebagai data
        }

        // Ambil jumlah pengguna dari database
        $users = User::find()->all();
        $userCount = count($users); // Menghitung jumlah pengguna

        // Siapkan data untuk grafik jumlah pengguna
        $userLabels = ['Jumlah User']; // Label untuk jumlah user
        $userData = [$userCount]; // Data untuk jumlah user

        return $this->render('index', [
            'paymentLabels' => json_encode($paymentLabels),
            'paymentData' => json_encode($paymentData),
            'userLabels' => json_encode($userLabels),
            'userData' => json_encode($userData),
        ]);
    }
}
