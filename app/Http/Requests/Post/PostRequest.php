<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
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
        //dd($this->route()->parameters);
        $validate =  [
            'title' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
            'slug' => [
                'required',
                'alpha_dash',
                Rule::unique('posts', 'slug')->ignore($this->route('post'))]

        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле название статьи не должно быть пустым',
            'title.min' => 'Поле название статьи долно состоять минимуи из 5 символов',
            'title.max' => 'Поле название статьи долно состоять максимум из 100 символов',
            'description.required' => 'Поле кроткое описание статьи не должно быть пустым',
            'description.max' => 'Поле название статьи долно состоять максимум из 255 символов',
            'text.required' => 'Поле тест статьи не должно быть пустым',
            'slug.required' => 'Поле символьный код статьи не должно быть пустым',
            'slug.alpha_dash' => 'Поле символьный код статьи должно состоять только из латинских символов, цифр и символов тире и подчеркивания ',
            'slug.unique' => 'Поле символьный код статьи должно быть уникальным',
        ];
    }
}
