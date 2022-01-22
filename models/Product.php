<?php
namespace app\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $product_category
 * @property string|null $product_detail
 */
class Product extends \yii\db\ActiveRecord
{

    const FASHION = 1;

    const ELECTRONICS = 2;

    const FOOD = 3;

    const GROCERIES = 4;

    public $title;

    public $price;

    public $description;

    /**
     *
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [
                [
                    'product_category',
                    'title',
                    'price'
                ],
                'required'
            ],
            [
                [
                    'description'
                ],
                'safe'
            ],

            [
                [
                    'price'
                ],
                'integer',
                'min' => 0
            ],
            [
                [
                    'product_detail'
                ],
                'string'
            ],
            [
                [
                    'product_category'
                ],
                'string',
                'max' => 255
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_category' => 'Product Category',
            'product_detail' => 'Product Detail'
        ];
    }

    public function CategoryList()
    {
        return [
            self::FASHION => "Fashion",
            self::GROCERIES => "Groceries",
            self::ELECTRONICS => "Electronics",
            self::FOOD => "Food"
        ];
    }

    /**
     * Convert to json
     *
     * @param unknown $model
     * @return string
     */
    public function converToJson($model)
    {
        $arr = [
            'title' => $model->title,
            'price' => $model->price,
            'description' => ! empty($model->description) ? $model->description : ''
        ];

        return Json::encode($arr);
    }

    /**
     *
     * @param unknown $index
     */
    public function productDetail($index)
    {
        $data = Json::decode($this->product_detail);
        if (! empty($data)) {
            return $data[$index];
        }
        return false;
    }

    public function getDesc()
    {
        $arr = $this->CategoryList();
        return ! empty($this->product_category) ? $arr[$this->product_category] : '';
    }
}
