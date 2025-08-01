<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['nullable', 'date_format:H:i', 'after:start_time'],
            'rest_start_1' => ['nullable', 'date_format:H:i'],
            'rest_end_1' => ['nullable', 'date_format:H:i', 'after:rest_start_1'],
            'rest_start_2' => ['nullable', 'date_format:H:i'],
            'rest_end_2' => ['nullable', 'date_format:H:i', 'after:rest_start_2'],
            'note' => ['nullable', 'string', 'max:255'],//
        ];
    }

    public function messages(): array
    {
        return [
            'start_time.required' => '出勤時間は必須です。',
            'start_time.date_format' => '出勤時間の形式が正しくありません（H:i）。',

            'end_time.date_format' => '退勤時間の形式が正しくありません（H:i）。',
            'end_time.after' => '退勤時間は出勤時間より後である必要があります。',

            'rest_start_1.date_format' => '休憩1の開始時刻の形式が正しくありません。',
            'rest_end_1.date_format' => '休憩1の終了時刻の形式が正しくありません。',
            'rest_end_1.after' => '休憩1の終了時刻は開始時刻より後である必要があります。',

            'rest_start_2.date_format' => '休憩2の開始時刻の形式が正しくありません。',
            'rest_end_2.date_format' => '休憩2の終了時刻の形式が正しくありません。',
            'rest_end_2.after' => '休憩2の終了時刻は開始時刻より後である必要があります。',

            'note.max' => '備考は255文字以内で入力してください。',
        ];
    }
}
