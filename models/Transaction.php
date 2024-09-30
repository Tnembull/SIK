<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Transaction extends ActiveRecord
{
    public static function tableName()
    {
        return 'transaction'; // Nama tabel dalam database
    }

    public function rules()
    {
        return [
            [['patient_id', 'action_id', 'medicine_id', 'date'], 'required'],
            [['patient_id', 'action_id', 'medicine_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }
}
