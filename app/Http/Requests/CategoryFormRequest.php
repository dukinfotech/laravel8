<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    public function attributes()
    {
        return ['name' => 'Tên thể loại'];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $nameRule = 'required|max:25|unique:categories';
        $nameRule = $this->method() == 'POST' ? $nameRule : $nameRule.',name,'.$this->id;

        return [
            'name' => $nameRule
        ];
    }
}
