<?php

namespace App\Http\Requests\API;

use Illuminate\Http\Response as HttpResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8', // Sửa đúng 'password'
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->messages();

        // Tạo phản hồi JSON với lỗi validation và mã lỗi 422
        $response = response()->json([
            'message' => 'Validation Failed',
            'errors' => $errors,
        ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY);

        // Ném ngoại lệ HttpResponseException
        throw new HttpResponseException($response);
    }
}
