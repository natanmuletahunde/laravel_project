<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules= [
            'name'=>[
                'required',
               'String',
            ],
           'slug'=>[
                'required',
               'String',
           ],
           'description'=>[
                'required',
               
           ],
           'yt_iframe'=>[
            'nullable',
               'String',
           ],
           'meta_title'=>[
                'required',
               'String',
           ],
           'meta_description'=>[
                'nullable',
               'String',
           ],
           'meta_keyword'=>[
                'nullable',
               'String',
           ],
           'status'=>[
                'nullable',
              
           ],
        ];
        return $rules;
    }
}
