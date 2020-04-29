<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class SaveMappingRequest extends FormRequest
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
            'mapping' => 'array'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            $mapping = $this->get('mapping', []);
            if (!array_search('team_id', $mapping)) {
                $validator->errors()->add('mapping', 'The Team ID field must be set.');
            }
            if (!array_search('phone', $mapping)) {
                $validator->errors()->add('mapping', 'The Phone field must be set.');
            }
        });
    }
}
