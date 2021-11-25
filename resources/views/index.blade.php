@extends('layout')

@section('content')
    <div class="container">
        <div class="text-center">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action=" {{route('category.store')}} " method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{old('category')}}">
                        @error('category')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Create Category">
                </form>
            </div>
            <div class="col-12 col-md-6">
                <form action=" {{route('article.store')}} " method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="  {{old('title')}} ">
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select name="category_id" id="" class="form-select">
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{$category->id}} ">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" cols="30" rows="7" class="form-control @error('description') is-invalid @enderror">
                        {{old('description')}}
                        </textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-info" value="Create Article">
                </form>
            </div>
        </div>
    </div>
@endsection