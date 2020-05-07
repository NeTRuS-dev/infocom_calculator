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
    protected string $_operation;
    protected Calculator $_calculatorInstance;

    public function __construct(array $data)
    {
        parent::__construct();
        $this->operation = $data['operation'];
    }

    public function rules()
    {
        return [
            ['operation', 'required'],
            ['operation', function ($attribute) {
                if (!(Calculator::isAllowedOperation($this->operation))) {
                    $this->addError($attribute, 'Invalid operation');
                }
            }],
        ];
    }

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