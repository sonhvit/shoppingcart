<?php

namespace common\models\store;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "product_description".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class ProductDescription extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public $thumbnail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['category_id'], 'integer'],
            ['thumbnail', 'safe']
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên sản phẩm',
            'description' => 'Nội dung',
            'status' => 'Trạng thái',
            'thumbnail' => 'Ảnh đại diện',
            'category_id' => 'Tên Nhóm',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'created_by' => 'Người tạo',
            'updated_by' => 'Người sửa',

        ];
    }
    public function getCategoryid()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'category_id']);
    }
}
