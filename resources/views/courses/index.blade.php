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
<a href="{{route('courses.create')}}" class="btn btn-success">Add course</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Course Name</th>
        <th scope="col">Duration</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Category</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $items)
    <tr>
        <th scope="row">{{$items->id}}</th>
        <td>{{$items->course_name}}</td>
        <td>{{$items->duration}}</td>
        <td>{{$items->price}}</td>
        <td><img src="{{\Storage::url($items->image_url)}}" width="100px" alt=""></td>
        <td>{{$items->category->name}}</td>
        <td>{{$items->description}}</td>
        <td>
            <a href="{{route('courses.edit', $items)}}" class="btn btn-warning">Edit</a>
            <form action="{{route('courses.destroy', $items)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
            </form>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$data->links()}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
