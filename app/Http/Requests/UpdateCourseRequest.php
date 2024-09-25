<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'course_name' => 'required|string|max:255', // Tên khóa học là bắt buộc, kiểu chuỗi, tối đa 255 ký tự
            'duration' => 'required|integer|min:1',     // Thời lượng là số nguyên dương và bắt buộc
            'price' => 'required|integer|min:0',        // Giá khóa học là số, không âm và bắt buộc
            'image_url' => 'nullable|image|mimes:jpg,png,jpe|max:2048',   // Đường dẫn hình ảnh có thể trống, tối đa 255 ký tự
            'category_id' => 'required|exists:categories,id', // ID loại khóa học là bắt buộc và phải tồn tại trong bảng categories
            'description' => 'nullable|string'        // Mô tả khóa học có thể trống, kiểu chuỗi
        ];
    }
    public function messages()
    {
        return [
            'course_name.required' => 'Tên khóa học là bắt buộc.',
            'course_name.max' => 'Tên khóa học không được vượt quá 255 ký tự.',
            'duration.integer' => 'Thời lượng phải là số nguyên.',
            'duration.min' => 'Thời lượng phải lớn hơn 0.',
            'price.required' => 'Giá khóa học là bắt buộc.',
            'price.integer' => 'Giá phải là một số nguyên.',
            'price.min' => 'Giá không được nhỏ hơn 0.',
            'image_url.image' => 'Tệp tải lên phải là hình ảnh.',
            'image_url.mimes' => 'Hình ảnh phải có định dạng: jpg, png, jpe.',
            'image_url.max' => 'Kích thước hình ảnh không được vượt quá 2048 kilobytes.',
            'category_id.required' => 'ID loại khóa học là bắt buộc.',
            'category_id.exists' => 'ID loại khóa học phải tồn tại trong bảng categories.',
            'description.string' => 'Mô tả phải là một chuỗi ký tự.',
            'duration.required' => 'Thời lượng khóa học là bắt buộc.'
        ];
    }
}
