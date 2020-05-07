<?php


namespace app\models\operations;


use app\models\Calculator;
use yii\base\Model;

/**
 * Class Operation
 * @property Calculator calculatorInstance
 * @property string operation
 */
abstract class Operation extends Model
{
    private string $_operation;
    private Calculator $_calculatorInstance;

    public function rules()
    {
        return [
            ['operation', 'required'],
        ];
    }

    protected abstract function makeCalc(float $left, string $operation, float $right): float;

    public abstract function executeOperation(): string;

    /**
     * @param Calculator $calculatorInstance
     * @return void
     */
    public function setCalculatorInstance(Calculator $calculatorInstance): void
    {
        $this->_calculatorInstance = $calculatorInstance;
    }

    /**
     * @return Calculator
     */
    public function getCalculatorInstance(): Calculator
    {
        return $this->_calculatorInstance;
    }

    /**
     * @return string
     */
    public function getOperation(): string
    {
        return $this->_operation;
    }

    /**
     * @param string $operation
     * @return void
     */
    public function setOperation(string $operation): void
    {
        $this->_operation = $operation;
    }
}