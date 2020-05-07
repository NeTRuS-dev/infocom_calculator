<?php


namespace app\models\operations;


use app\models\EvalTypes;

class BinaryOperation extends Operation
{
    public ?string $rightValue;

    /**
     * Operation constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->rightValue = $data['rightValue'] ?? null;

    }

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

    protected function makeCalc(float $left, string $operation, float $right): float
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