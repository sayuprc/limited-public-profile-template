<?php

declare(strict_types=1);

namespace App\Http\Requests\QR;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return true
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'qr_code_id' => [
                'required',
            ],
            'user_id' => [
                'required',
                'same:session_user_id',
            ],
            'expired_at_date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'expired_at_time' => [
                'required',
                'date_format:H:i',
            ],
        ];
    }

    /**
     * @return array
     */
    public function validationData(): array
    {
        $data = $this->all();

        $data['session_user_id'] = $this->user()->user_id;

        return $data;
    }
}
