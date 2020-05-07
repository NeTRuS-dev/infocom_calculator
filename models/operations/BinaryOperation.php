<?php


namespace app\models\operations;


use app\models\EvalTypes;
use yii\helpers\ArrayHelper;

class BinaryOperation extends Operation
{
    public ?string $rightValue = null;

    /**
     * Operation constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct();
        $this->attributes = $data;
    }

//    public function rules()
//    {
//        return ArrayHelper::merge(parent::rules(), [
//            ['rightValue', 'required'],
//        ]);
//    }

    public function executeOperation(): string
    {
        // TODO: Implement executeOperation() method.
        if (!$this->validate()) {
            return '';
        } else {
            if ($this->rightValue) {
                $this->calculatorInstance->memorizedData = $this->makeCalc($this->calculatorInstance->memorizedData, $this->calculatorInstance->memorizedOperation, $this->rightValue);
            }
            $this->calculatorInstance->memorizedOperation = $this->operation;

        }
    }

    private function makeCalc(float $left, string $operation, float $right): float
    {
        switch ($operation) {
            case EvalTypes::add:
                break;
            case EvalTypes::divide:
                break;
            case EvalTypes::mod:
                break;
            case EvalTypes::multiply:
                break;
            case EvalTypes::pow:
                break;
            default:
                break;
        }
    }
}