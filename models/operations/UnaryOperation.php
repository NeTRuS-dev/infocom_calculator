<?php


namespace app\models\operations;


use yii\helpers\ArrayHelper;

class UnaryOperation extends Operation
{
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

    public function executeOperation(): string
    {
        // TODO: Implement executeOperation() method.
        if (!$this->validate()) {
            return '';
        } else {

        }
    }
}