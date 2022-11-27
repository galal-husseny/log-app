<?php

namespace App\Http\Requests;

use App\Rules\FileExists;
use Illuminate\Foundation\Http\FormRequest;

class NextRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'path'=>['required',new FileExists],
            'lastIndex'=>['required','integer']
        ];
    }
}
