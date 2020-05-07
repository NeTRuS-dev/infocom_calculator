<?php


namespace app\models;


abstract class Operation extends \yii\base\Model
{
    public string $operation;
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
        return [
            ['operation', 'required'],
        ];
    }
}