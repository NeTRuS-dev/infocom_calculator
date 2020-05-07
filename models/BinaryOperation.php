<?php


namespace app\models;


use yii\helpers\ArrayHelper;

class BinaryOperation extends Operation
{
    public string $rightValue;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['rightValue', 'required'],
        ]);
    }
}