<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'courses';
    protected $fillable = [
        'course_name',
        'duration',
        'price',
        'image_url',
        'category_id',
        'description'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getAllCourses()
    {
        return Course::query()->with('category')
                ->latest('id')
                ->paginate(10);
    }
    public function createCourse($data)
    {
        return Course::query()->create($data);
    }
    public function updateCourse($id, $data)
    {
        return Course::query()->find($id)->update($data);
    }
    public function deleteCourse($id)
    {
        return Course::query()->find($id)->delete();
    }
}
