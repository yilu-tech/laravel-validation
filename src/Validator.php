<?php

namespace YiluTech\Validation;

use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator as ValidatorContract;
use Request;

class Validator extends ValidatorContract
{
    public function validate()
    {
        $result = parent::validate(); // TODO: Change the autogenerated stub

        if (Request::hasHeader('VALIDATOR-REQUEST')) {

            throw new ValidationException($this);

        }
        return $result;
    }

    public function passes()
    {
        $result = parent::passes(); // TODO: Change the autogenerated stub
        if (Request::hasHeader('VALIDATOR-REQUEST')) {

            throw new ValidationException($this);

        }
        return $result;
    }
}