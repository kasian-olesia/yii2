<?php

namespace app\models;

use Yii;
use yii\validators\RequiredValidator;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'scenarioCreate';
    const SCENARIO_UPDATE = 'scenarioUpdate';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }
    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['name'],
            self::SCENARIO_CREATE => ['name', 'price', 'created_at'],
            self::SCENARIO_UPDATE => ['price', 'created_at'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'created_at'], 'required'],
            [['created_at'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['name'], 'filter', 'filter' => function ($value) {
                return trim(strip_tags($value));
            }],
            [['price'], 'integer', 'min' => 1, 'max' => 999]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }
}
