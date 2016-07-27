<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interests".
 *
 * @property string $interest_id
 * @property string $user_id
 * @property string $product_id
 * @property integer $status
 *
 * @property BuyRequests[] $buyRequests
 * @property Products $product
 * @property Users $user
 */
class Interests extends \yii\db\ActiveRecord
{
    const INTEREST_CONFIRMED = 1;
    const INTEREST_UNCONFIRMED =0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id'], 'required'],
            [['user_id', 'product_id', 'status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'interest_id' => 'Interest ID',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyRequests()
    {
        return $this->hasMany(BuyRequests::className(), ['interest_id' => 'interest_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }
}
