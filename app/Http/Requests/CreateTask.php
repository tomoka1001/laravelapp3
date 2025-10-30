<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
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
    // バリデーションルール
    public function rules()
    {
        return [
            // 必須、100文字以内
            'title' => 'required|max:100',
            // 必須、日付、after_or_equalの引数としてtodayを指定することにより今日を含んだ未来日だけを許容
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    // エラーがあった場合に表示する項目
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'due_date' => '期限日',
        ];
    }

    // エラーメッセージ
    public function messages()
    {
        // キーでメッセージが表示されるべきルールを指定する。
        return [
            // ドット区切りで左側が項目、右側がルールを意味する。
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
