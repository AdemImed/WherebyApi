<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhereByRequest extends FormRequest
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
            "isLocked"  => 'required|boolean',
            "roomNamePrefix"    => 'nullable|string|max:39',
            "roomNamePattern"   => 'required|string|in:human-short,uuid',
            "roomMode"  => 'required|string|in:group,normal',
            "endDate"   => 'required|date',
            "fields"    => 'nullable|array'
        ];
    }
}
