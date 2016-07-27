<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\web\UploadedFile;

/**
 * This is the model class for table "products".
 *
 * @property string $product_id
 * @property string $product_name
 * @property string $price
 * @property string $product_bargainable
 * @property string $front_view_image
 * @property string $back_view_image
 * @property string $side_view_image
 * @property string $top_view_image
 * @property string $description
 * @property integer $product_status
 * @property string $user_id
 * @property string $category
 * @property integer $no_of_views
 * @property string $date_created
 *
 * @property Interests[] $interests
 * @property Users $user
 */
class Products extends \yii\db\ActiveRecord
{
    const PRODUCT_ACTIVE = 1;
    const PRODUCT_INACTIVE =0;

    public $front_view_file;
    public $back_view_file;
    public $side_view_file;
    public $top_view_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'price', 'product_bargainable', 'front_view_image', 'back_view_image', 'side_view_image', 'top_view_image', 'description', 'user_id', 'category'], 'required'],
            [['product_bargainable', 'description'], 'string'],
            [['product_status', 'user_id', 'no_of_views'], 'integer'],
            [['date_created'], 'safe'],
           // [['front_view_file', 'back_view_file', 'side_view_file','top_view_file'], 'required'],
            [['front_view_file', 'back_view_file', 'side_view_file','top_view_file'], 'file'],
            [['product_name', 'price', 'front_view_image', 'back_view_image', 'side_view_image', 'top_view_image', 'category'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'price' => 'Price',
            'product_bargainable' => 'Product Negotiable',
            'front_view_image' => 'Front View Image',
            'back_view_image' => 'Back View Image',
            'side_view_image' => 'Side View Image',
            'top_view_image' => 'Top View Image',
            'description' => 'Description',
            'category' => 'Category',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interests::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }

    public function initialise(){
        $this->user_id = Yii::$app->user->getId();
        $this->product_status = 1;
        $this->no_of_views = 0;
        $this->date_created = date("Y-m-d H:i:s");
    }

    //get the file instances of all uploaded files
    public function getUploadedFiles(){
        $front_image_name = strtotime(date("Y-m-d H:i:s")).'_front_'.$this->user_id;
        $back_image_name = strtotime(date("Y-m-d H:i:s")).'_back_'.$this->user_id;
        $side_image_name = strtotime(date("Y-m-d H:i:s")).'_side_'.$this->user_id;
        $top_image_name = strtotime(date("Y-m-d H:i:s")).'_top_'.$this->user_id;

        $this->front_view_file = UploadedFile::getInstance($this, 'front_view_file');
        $this->back_view_file = UploadedFile::getInstance($this, 'back_view_file');
        $this->side_view_file = UploadedFile::getInstance($this, 'side_view_file');
        $this->top_view_file = UploadedFile::getInstance($this, 'top_view_file');

        $this->front_view_file->saveAs('img/products_images/' . $front_image_name. '.'. $this->front_view_file->extension);
        $this->back_view_file->saveAs('img/products_images/' . $back_image_name. '.'. $this->back_view_file->extension);
        $this->side_view_file->saveAs('img/products_images/' . $side_image_name. '.'.$this->side_view_file->extension);
       $this->top_view_file->saveAs('img/products_images/' . $top_image_name. '.'.$this->top_view_file->extension);

        $this->front_view_image = 'img/products_images/' . $front_image_name.'.'. $this->front_view_file->extension;
        $this->back_view_image = 'img/products_images/' . $back_image_name.'.'. $this->back_view_file->extension;
        $this->side_view_image = 'img/products_images/' . $side_image_name.'.'.$this->side_view_file->extension;
        $this->top_view_image = 'img/products_images/' . $top_image_name.'.'.$this->top_view_file->extension;
    }
}
