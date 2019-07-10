<?php

namespace YiluTech\Validation;

use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Http\Request;

class FormRequest extends LaravelFormRequest
{
    /*
     *  @return string (X_X_X_rules)
     *
     */

    public function rules(Request $request)
    {
        $functionName = substr($request->getRequestUri(), 1);

//        $functionName = preg_replace('/[\/\-]/', '_' , $functionName);

        //取方法名
        $functionName = explode("/",$functionName);
        $functionName = explode("?",$functionName[count($functionName)-1]);
        $functionName = $functionName[0] . "_rules";

        return $this->$functionName();
    }
}