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
        if (!$this->validate()) {
            return '';
        } else {
            if ($this->rightValue) {
                $tmp = strval($this->makeCalc($this->calculatorInstance->memorizedData, $this->calculatorInstance->memorizedOperation, floatval($this->rightValue)));
                if ($this->operation === EvalTypes::evaluate) {
                    $this->calculatorInstance->unsetMemorizedOperation();
                    $this->calculatorInstance->unsetMemorizedData();
                    return "{$tmp}";
                }
                $this->calculatorInstance->memorizedData = $tmp;
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
                $returnValue = $left + $right;
                break;
            case EvalTypes::subtract:
                $returnValue = $left - $right;
                break;
            case EvalTypes::divide:
                $returnValue = $left / $right;
                break;
            case EvalTypes::mod:
                $returnValue = $left % $right;
                break;
            case EvalTypes::multiply:
                $returnValue = $left * $right;
                break;
            case EvalTypes::pow:
                $returnValue = $left ** $right;
                break;
        }
        return $returnValue;
    }
}