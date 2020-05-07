<?php


namespace app\models;


use yii\helpers\ArrayHelper;

class MemoryOperation extends Operation
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
            ['rightValue', 'required', 'when' => function (MemoryOperation $model) {
                return ($model->_operation === EvalTypes::M_add || $model->_operation === EvalTypes::M_sub);
            }],
        ]);
    }

    public function executeOperation()
    {
        // TODO: Implement executeOperation() method.
    }
}