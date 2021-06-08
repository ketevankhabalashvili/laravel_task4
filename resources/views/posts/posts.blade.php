@extends('layout')

@section('container')
    <div class="container mt-5 ">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('post.create') }}"> Add</a>
            <a class="btn btn-warning"  href="{{ route('home') }}"> Home</a>
        </div>
        <br>
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Tag</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($posts->count() == 0)

                <td colspan="4" class="text-center">   no data. </td>

            @else
                @foreach($posts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->tag->name }}</td>
                        <td>

{{--                            <form action="{{ route('hire',$item->id) }}" method="POST" style ='float: left; padding: 2px;'>--}}
{{--                                @csrf--}}
{{--                                @if($item->is_hired == 1)--}}
{{--                                    <input type="hidden" name="is_hired" value="0">--}}
{{--                                    <button type="submit" class="btn btn-secondary">Hired</button>--}}
{{--                                @else--}}
{{--                                    <input type="hidden" name="is_hired" value="1">--}}
{{--                                    <button type="submit" class="btn btn-secondary">Not hired</button>--}}
{{--                                @endif--}}
{{--                            </form>--}}
                            <form action="{{ route('post.destroy',$item->id) }}" method="POST" style ='float: left; padding: 2px;'>

{{--                                <a class="btn btn-info" href="{{ route('show',$item->id) }}">Show</a>--}}

                                <a class="btn btn-primary" href="{{ route('post.edit',$item->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
        <p>
            show {{$posts->count()}} item from  {{ $posts->total() }}.
        </p>
    </div>
@endsection
