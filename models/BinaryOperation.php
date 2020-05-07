<?php


namespace app\models;


use yii\helpers\ArrayHelper;

class BinaryOperation extends Operation
{
    public string $rightValue;

    /**
     * Operation constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct();
        $this->attributes = $data;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['rightValue', 'required'],
        ]);
    }

    public function executeOperation()
    {
        // TODO: Implement executeOperation() method.
    }
}