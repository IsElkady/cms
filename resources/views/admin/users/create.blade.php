@extends("layouts.admin")

    @section("content")
        <h1>Create User</h1>













            {{--<select>--}}
            {{--<option>Administrator</option>--}}
            {{--<option>Author</option>--}}
            {{--<option>Subscriber</option>--}}
            {{--</select>--}}






        <form method="POST" action="/admin/users" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <table class="table table-hover">

                <tbody>

                 <tr>
                    <td><label>Name:</label></td>
                    <td><input type="text" name="txtName" class="form-control"></td>
                 </tr>
                 <tr>
                    <td><label>E-mail:</label></td>
                    <td><input type="text" name="txtEmail" class="form-control"></td>
                 </tr>
                 <tr>
                    <td><label>Password:</label></td>
                    <td><input type="password" name="txtPassword" class="form-control"></td>
                </tr>
                <tr>
                    <td><label>Status:</label></td>
                    <td><input type="checkbox" name="chkActive"></td>
                </tr>
                <tr>
                    <td>
                        <label>Role:</label>
                    </td>
                    <td>
                        <select name="ddlRoles" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{ucfirst(strtolower($role->name))}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                 <tr>
                     <td><label>Image:</label></td>
                     <td><input type="file" name="photo" class="form-control"></td>
                 </tr>
                <tr>

                    <td>  <input type="submit" value="Create" class="btn btn-primary"></td>
                    <td></td>
                </tr>
              </tbody>
            </table>
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