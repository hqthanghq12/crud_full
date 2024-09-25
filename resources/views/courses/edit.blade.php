<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  action="{{route('courses.update', $course)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Course Name</label>
        <input type="text" class="form-control" value="{{$course->course_name}}" name="course_name">
    </div>
    <div class="mb-3">
        <label class="form-label">Duration</label>
        <input type="text" class="form-control" value="{{$course->duration}}" name="duration">
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" class="form-control" value="{{$course->price}}" name="price">
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image_url">
        <img src="{{\Storage::url($course->image_url)}}" width="100px">
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select">
            @foreach($categorys as $value)
                <option value="{{$value->id}}" {{$value->id==$course->category_id ? 'selected': ''}}>{{$value->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" value="{{$course->description}}" name="description">
    </div>
    <input type="submit" name="btn_Sub" value="Save" class="btn btn-primary">
    <a href="{{route('courses.index')}}" class="btn btn-secondary">Return to list</a>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
