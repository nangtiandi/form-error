@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mt-2">
                @if (session('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
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
                <form action=" {{route('article.update',$article->id)}} " method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{old('title',$article->title)}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select name="category_id" id="" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ $category->id == $article->category_id ? "selected" : ""}}>{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" cols="30" rows="6" class="form-control"> {{$article->description}} </textarea>
                    </div>
                    <input type="submit" class="btn btn-info" value="Update Article">
                </form>
            </div>
            <div class="col-md-8">
                <div class="my-3">
                    @include('article.list')
                </div>
            </div>
        </div>
    </div>
@endsection