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
            return "{$this->calculatorInstance->memorizedData} {$this->calculatorInstance->memorizedOperation}";
        }
    }

    private function makeCalc(float $left, string $operation, float $right): float
    {
        /**
         * @var float $returnValue
         * this will be return after calc
         */
        $returnValue = 0;
        switch ($operation) {
            case EvalTypes::add:
                $returnValue = $this->calculatorInstance->memorizedData + $this->rightValue;
                break;
            case EvalTypes::divide:
                $returnValue = $this->calculatorInstance->memorizedData / $this->rightValue;
                break;
            case EvalTypes::mod:
                $returnValue = $this->calculatorInstance->memorizedData % $this->rightValue;
                break;
            case EvalTypes::multiply:
                $returnValue = $this->calculatorInstance->memorizedData * $this->rightValue;
                break;
            case EvalTypes::pow:
                $returnValue = $this->calculatorInstance->memorizedData ** $this->rightValue;
                break;
        }
        return $returnValue;
    }
}