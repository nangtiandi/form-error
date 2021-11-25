@if (session('delete'))
    <p class="alert alert-danger">{{session('delete')}}</p>
@endif
@if (session('update'))
    <p class="alert alert-success">{{session('update')}}</p>
@endif
@foreach ($articles as $article)
    <div class="card my-1">
        <div class="card-body">
            <h3>{{$article->title}}</h3>
            <p class="badge bg-info">{{$article->category->category}}</p>
            <p>{{$article->description}}</p>
            <div class="d-flex">
                <a href=" {{route('article.edit',$article->id)}} " class="btn btn-warning mx-1">Edit</a>
                <form action=" {{route('article.destroy',$article->id)}} " method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger mx-1">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
