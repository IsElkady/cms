@extends("layouts.admin")

    @section("content")

        <h1>Create Post</h1>
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           {{--<table class="table table-hover">--}}

               {{--<tbody>--}}
                {{--<tr>--}}
                   {{--<td>Title</td>--}}
                   {{--<td><input type="text" name="txtTitle" class="form-control"></td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                   {{--<td>Content</td>--}}
                   {{--<td><textarea name="txtBody" class="form-control" rows="5"></textarea></td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>Category</td>--}}
                    {{--<td><select class="form-control">--}}
                            {{--<option value="1">Category 1</option>--}}
                            {{--<option value="2">Category 2</option>--}}
                        {{--</select></td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                   {{--<td>Image</td>--}}
                   {{--<td><input type="file" name="flPhoto"></td>--}}
               {{--</tr>--}}
               {{--<tr>--}}
                    {{--<td><input type="submit" class="btn btn-primary"></td>--}}
                    {{--<td></td>--}}
               {{--</tr>--}}
             {{--</tbody>--}}
           {{--</table>--}}






                    <div class="form-group">
                       <label> Title:</label>
                    <input type="text" name="txtTitle" class="form-control">
                    </div>

            <div class="form-group"><label> Content:</label>
                    <textarea name="txtBody" class="form-control" rows="5"></textarea>
                    </div>
            <div class="form-group"><label> Category:</label>
                    <select class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Image:</label>
                        <input type="file" name="flPhoto" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>




        </form>

        @if(count($errors)>0)

                <div class="alert alert-danger">
                    <ul>
            @foreach($errors->all() as $error)

                <li>{{$error}}</li>

            @endforeach
                    </ul>
                </div>

        @endif
    @endsection