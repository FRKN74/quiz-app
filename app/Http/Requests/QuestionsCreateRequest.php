<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsCreateRequest extends FormRequest
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
        return [
            'question' => 'required|min:3',
            'image' =>    'nullable|image|max:5024|mimes:png,jpg,jpeg',
            'answer1' =>  'required|min:1',
            'answer2' =>  'required|min:1',
            'answer3' =>  'required|min:1',
            'answer4' =>  'required|min:1',
        ];
    }
    public function attribute()
    {
        return [
            'question' => 'Soru',
            'image' => 'Soru fotoğrafı',
            'answer1' => '1.Cevap',
            'answer2' => '2.Cevap',
            'answer3' => '3.Cevap',
            'answer4' => '4.Cevap',
            'correct_answer' => 'Doğru cevap',
        ];
    }
}
