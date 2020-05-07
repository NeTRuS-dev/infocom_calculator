<?php


namespace app\models;


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

    public function executeOperation()
    {
        // TODO: Implement executeOperation() method.
    }
}