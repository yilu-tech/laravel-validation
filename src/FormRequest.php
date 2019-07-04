<?php

namespace YiluTech\Validation;

use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Http\Request;

class FormRequest extends LaravelFormRequest
{
    /*
     *  @return string (X_X_X_rule)
     *
     */

    public function rules(Request $request)
    {
        $functionName = substr($request->getRequestUri(), 1);

        preg_replace('/[\/\-]/g', '_' , $functionName);

        $functionName = $functionName . "_rules";

        return $this->$functionName();
    }
}