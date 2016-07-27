<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $user_id
 * @property string $fullname
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_salt
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone_no
 * @property string $sex
 * @property string $nationality
 * @property string $current_country
 * @property string $current_city
 * @property string $profile_picture
 * @property string $created_date
 * @property string $updated_date
 * @property integer $account_status
 * @property integer $online_status
 *
 * @property Chat[] $chats
 * @property Chat[] $chats0
 * @property CustomerLists[] $customerLists
 * @property CustomerLists[] $customerLists0
 * @property Interests[] $interests
 * @property Notifications[] $notifications
 * @property Notifications[] $notifications0
 * @property Products[] $products
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'username', 'password_hash', 'auth_key', 'password_salt', 'email', 'phone_no'], 'required'],
            [['sex'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['account_status', 'online_status'], 'integer'],
            [['fullname'], 'string', 'max' => 250],
            [['username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['password_salt', 'email', 'profile_picture'], 'string', 'max' => 100],
            [['phone_no'], 'string', 'max' => 20],
            [['nationality', 'current_country', 'current_city'], 'string', 'max' => 50],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'fullname' => 'Fullname',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'password_salt' => 'Password Salt',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'phone_no' => 'Phone No',
            'sex' => 'Sex',
            'nationality' => 'Nationality',
            'current_country' => 'Current Country',
            'current_city' => 'Current City',
            'profile_picture' => 'Profile Picture',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'account_status' => 'Account Status',
            'online_status' => 'Online Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['receiver_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats0()
    {
        return $this->hasMany(Chat::className(), ['sender_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerLists()
    {
        return $this->hasMany(CustomerLists::className(), ['buyer_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerLists0()
    {
        return $this->hasMany(CustomerLists::className(), ['seller_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interests::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::className(), ['created_by_user' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications0()
    {
        return $this->hasMany(Notifications::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['user_id' => 'user_id']);
    }
}
