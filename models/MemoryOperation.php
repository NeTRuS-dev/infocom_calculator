<?php


namespace app\models;


use yii\helpers\ArrayHelper;

class MemoryOperation extends Operation
{
    public string $rightValue;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['rightValue', 'required', 'when' => function (MemoryOperation $model) {
                return ($model->operation === EvalTypes::M_add || $model->operation === EvalTypes::M_sub);
            }],
        ]);
    }
}