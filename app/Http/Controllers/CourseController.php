<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    //
    protected $courseModel;
    public function __construct(Course $courseModel)
    {
        $this->courseModel = $courseModel;
    }
    public function index(){
        $data = $this->courseModel->getAllCourses();
        return view('courses.index', compact('data'));
    }
    public function create(){
        $objCategory = new Category();
        $categorys = $objCategory->getAllCategory();
        return view('courses.create', compact('categorys'));
    }
    public function store(StoreCourseRequest $request){
        $data = $request->except('image_url');
        if($request->hasFile('image_url')){
            $data['image_url'] = Storage::put('public/courseimg', $request->file('image_url'));
        }
        $course = $this->courseModel->createCourse($data);
        if($course){
            return redirect()->route('courses.index')->with('success', 'Them thanh cong');
        }

    }
    public function edit(Course $course){
        $objCategory = new Category();
        $categorys = $objCategory->getAllCategory();
        return view('courses.edit', compact('course', 'categorys'));
    }
    public function update(UpdateCourseRequest $request, Course $course){
//        dd($request->all());
        $data = $request->except('image_url');
        if($request->hasFile('image_url')){
            $data['image_url'] = Storage::put('public/courseimg', $request->file('image_url'));
        }else{
            $data['image_url'] = $course->image_url;
        }
//        $imageOld = $course->image_url;
        $courseUpdate = $this->courseModel->updateCourse($course->id,$data);
        if($courseUpdate){
            if($request->hasFile('image_url') && Storage::exists($course->image_url)) {
                Storage::delete($course->image_url);
            }
            return redirect()->back()->with('success', 'Sua thanh cong');
        }
    }
    public function destroy(Course $course)
    {
        $courseDelete = $this->courseModel->deleteCourse($course->id);
        return redirect()->route('courses.index')->with('success', 'Xoa thanh cong');
    }
}
