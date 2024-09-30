<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Payment extends ActiveRecord
{
    public static function tableName()
    {
        return 'payment'; // Nama tabel dalam database
    }

    public function rules()
    {
        return [
            [['transaction_id', 'amount', 'date'], 'required'],
            [['transaction_id'], 'integer'],
            [['amount'], 'number'],
            [['date'], 'safe'],
        ];
    }
}
