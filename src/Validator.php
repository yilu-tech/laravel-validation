<?php

namespace YiluTech\Validation;

use Illuminate\Validation\Validator as ValidatorContract;
use Illuminate\Support\Facades\Request;

class Validator extends ValidatorContract
{
    public function passes()
    {
        return parent::passes() && !Request::hasHeader('Xhr-Form-Validator') && !Request::hasHeader('VALIDATOR-REQUEST');
    }
}
