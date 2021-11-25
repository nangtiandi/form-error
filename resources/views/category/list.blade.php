@if (session('delete'))
    <p class="alert alert-danger">{{session('delete')}}</p>
@endif
@if (session('update'))
    <p class="alert alert-success">{{session('update')}}</p>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Created Time</th>
            <th colspan="2">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}} </td>
            <td>{{$category->category}}</td>
            <td>{{$category->created_at}}</td>
            <td><a href="  {{route('category.edit',$category->id)}} " class="btn btn-warning">Edit</a></td>
            <td>
                <form action=" {{route('category.destroy',$category->id)}} " method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>