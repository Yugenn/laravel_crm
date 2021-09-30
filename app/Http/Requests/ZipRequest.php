<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 認証関連の判定がない場合はtrueにしておきます
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
            'name' => 'required|string|max:50',
            'email' => 'required|email:rfc,dns',
            'postcode' => 'required|integer|min:7|max:7',
            'address' => 'required|string|min:1',
            'phoneNumber' => 'required|string|max:20',
        ];
    }
}

