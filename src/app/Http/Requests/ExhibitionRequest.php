<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'product' => 'required|string|max:255',
            'product_description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'string',
            'product_state' => 'required|string|in:良好,目立った傷や汚れなし,やや傷や汚れあり,状態が悪い',
            'price' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'product.required' => '商品名は必須です。',
            'product.max' => '商品名は255文字以内で入力してください。',
            'product_description.required' => '商品の説明は必須です。',
            'product_description.max' => '商品の説明は255文字以内で入力してください。',
            'image.required' => '商品画像は必須です。',
            'image.image' => '画像ファイルを選択してください。',
            'image.mimes' => '画像はjpegまたはpng形式でアップロードしてください。',
            'image.max' => '画像のサイズは2MB以下にしてください。',
            'categories.required' => 'カテゴリーを1つ以上選択してください。',
            'product_state.required' => '商品の状態を選択してください。',
            'product_state.in' => '選択された商品の状態が不正です。',
            'price.required' => '販売価格は必須です。',
            'price.integer' => '販売価格は整数で入力してください。',
            'price.min' => '販売価格は0円以上にしてください。',
        ];
    }
}
