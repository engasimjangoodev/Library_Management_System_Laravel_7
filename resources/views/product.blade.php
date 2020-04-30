@extends('layouts.template')
@section('content')
    @foreach($posts as $post)
        <tr id="row_{{$post->id}}">
            <td>{{ $post->id  }}</td>
            <td>{{ $post->title }}</td>

            <td><a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="editPost(event.target)"
                   class="btn btn-info">Edit</a></td>
            <td>
                <a href="javascript:void(0)" data-id="{{ $post->id }}" class="btn btn-danger"
                   onclick="deletePost(event.target)">Delete</a></td>
        </tr>
    @endforeach
@stop
@section('script')
    <scrip>


    </scrip>


@endsection
