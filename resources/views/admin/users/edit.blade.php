@extends("layouts.admin")

@section("content")
    <h1>Edit User</h1>


    {{--<select>--}}
    {{--<option>Administrator</option>--}}
    {{--<option>Author</option>--}}
    {{--<option>Subscriber</option>--}}
    {{--</select>--}}
    <div class="row">
        <div class="col-sm-3">
                <img src="/images/{{isset($user->photo)?$user->photo->path:"avatar.jfif"}}" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">
            <form method="POST" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT"/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <table class="table table-hover">

                    <tbody>

                    <tr>
                        <td><label>Name:</label></td>
                        <td><input type="text" name="txtName" value="{{$user->name}}"></td>
                    </tr>
                    <tr>
                        <td><label>E-mail:</label></td>
                        <td><input type="text" name="txtEmail" value="{{$user->email}}"></td>
                    </tr>
                    <tr>
                        <td><label>Password:</label></td>
                        <td><input type="password" name="txtPassword"></td>
                    </tr>
                    <tr>
                        <td><label>Status:</label></td>
                        <td><input type="checkbox" name="chkActive" {{($user->is_active==1)?'checked':''}}></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Role:</label>
                        </td>
                        <td>
                            <select name="ddlRoles">
                                @foreach($roles as $role)
                                    @if(strtolower($user->roles->name)==strtolower($role->name))
                                        <option value="{{$user->roles->id}}" selected="selected">{{ucfirst(strtolower($role->name))}}</option>
                                    @else
                                        <option value="{{$role->id}}" >{{ucfirst(strtolower($role->name))}}</option>
                                    @endif


                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Image:</label></td>
                        {{--<img  height="150px" style="padding-bottom:10px;" src="/images/{{isset($user->photo)?$user->photo->path:"avatar.jfif"}}">--}}

                        <td>  <input type="file" name="photo"  value="/images/{{isset($user->photo)?$user->photo->path:"avatar.jfif"}}"></td>
                    </tr>
                    <tr>

                        <td>  <input type="submit" value="Update" class="btn btn-primary"></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="row">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection