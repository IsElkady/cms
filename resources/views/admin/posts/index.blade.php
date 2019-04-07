@extends("layouts.admin")

    @section("content")

        <h1>Posts Page</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>User</th>
                <th>Photo</th>
                <th>Category</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
        @foreach($posts as $post)


                 <tr>
                     <td>{{$post->user->name}}</td>
                     <td><img src="/images/{{$post->photo?$post->photo->path:"avatar.jpg"}}" height="50" ></td>
                     <td>{{$post->category->name}}</td>
                     <td>{{$post->title}}</td>
                     <td>{{$post->body}}</td>
                     <td>{{$post->created_at->diffForhumans()}}</td>
                     <td>{{$post->updated_at->diffForhumans()}}</td>
                 </tr>


        @endforeach
            </tbody>
        </table>
        {{--@if($users)--}}
            {{--@foreach($users as $user)--}}
                {{--{{dd($user)}}--}}
                {{--@foreach($user->post as $post)--}}
                    {{--<h3>{{$post->title}}</h3>--}}

                    {{--<p>{{$post->body}}</p>--}}
                {{--@endforeach--}}
            {{--@endforeach--}}

        {{--@endif--}}
    @endsection