<?php

namespace YiluTech\Validation;

use Illuminate\Validation\Validator as ValidatorContract;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Validator extends ValidatorContract
{
    public function isValidateRequest()
    {
        return Request::hasHeader('Xhr-Form-Validator') || Request::hasHeader('VALIDATOR-REQUEST');
    }

    public function passes()
    {
        return parent::passes() && !$this->isValidateRequest();
    }

    public function validate()
    {
        try {
            return parent::validate();
        } catch (\Exception $exception) {
            if ($this->messages->isEmpty()) {
                throw new HttpException(202, 'Form validate success.');
            }
            throw $exception;
        }
    }
}
