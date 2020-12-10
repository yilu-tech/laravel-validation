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
        $functionName = substr(explode('?', $request->getRequestUri())[0], 1);

//        $functionName = preg_replace('/[\/\-]/', '_' , $functionName);

        //取方法名
        $functionName = explode("/",$functionName);
        $functionName = explode("?",$functionName[count($functionName)-1]);
        $functionName = preg_replace('/[\-]/', '_' , $functionName[0]);
        $functionName = $functionName . "_rules";

        return $this->$functionName();
    }
}
