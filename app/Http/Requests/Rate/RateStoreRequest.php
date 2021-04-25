<?php

namespace App\Http\Requests\Rate;

use App\Models\Rate;
use App\Rules\RateOnce;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RateStoreRequest extends FormRequest
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
            'post_id' => [
                'required',
                new RateOnce()
            ],
            'rate' => 'required|integer|between:1,5'
        ];
    }
}
