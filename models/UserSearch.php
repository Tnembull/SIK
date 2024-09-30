<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'role'], 'safe'], // Hapus password dari pencarian demi keamanan
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios(); // Menggunakan implementasi skenario standar
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find(); // Menggunakan ActiveRecord User untuk query

        // Membuat instance ActiveDataProvider untuk menampilkan data dalam GridView atau ListView
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // Jika validasi gagal, jangan kembalikan record apa pun
            $query->where('0=1');
            return $dataProvider;
        }

        // Tambahkan kondisi pencarian
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'role', $this->role]);

        return $dataProvider;
    }
}
