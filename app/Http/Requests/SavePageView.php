<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePageView extends FormRequest
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
            'url' => 'required|url',
            'ip' => 'required|ip',
            'user_agent' => 'required|string'
        ];
    }
}
