<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề bài viết',
            'thumbnail_path' => 'Đường dẫn ảnh thumbnail',
            'summary' => 'Nội dung tóm tắt',
            'tags' => 'Thẻ tag',
            'content' => 'Nội dung chính'
        ];
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
        $titleRule = 'required|max:255|unique:posts';
        $titleRule = $this->method() == 'POST' ? $titleRule : $titleRule.',title,'.$this->id;

        return [
            'title' => $titleRule,
            'thumbnail_path' => 'max:255|nullable',
            'summary' => 'max:255|nullable',
            'tags.*' => 'exists:tags,id',
            'content' => 'required'
        ];
    }
}
