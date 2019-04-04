@extends("layouts.admin")

    @section("content")
        <h1>Create User</h1>













            {{--<select>--}}
            {{--<option>Administrator</option>--}}
            {{--<option>Author</option>--}}
            {{--<option>Subscriber</option>--}}
            {{--</select>--}}






        <form method="POST" action="/admin/users">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <table class="table table-hover">

                <tbody>

                 <tr>
                    <td>Name:</td>
                    <td><input type="text" name="txtName" ></td>
                 </tr>
                 <tr>
                    <td>E-mail address:</td>
                    <td><input type="text" name="txtEmail"></td>
                 </tr>
                 <tr>
                    <td>Password:</td>
                    <td><input type="password" name="txtPassword"></td>
                </tr>
                <tr>
                    <td>Availability:</td>
                    <td><input type="checkbox" name="chkActive" ></td>
                </tr>
                <tr>
                    <td>
                        Role:
                    </td>
                    <td>
                        <select name="ddlRoles">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{ucfirst(strtolower($role->name))}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>

                    <td>  <input type="submit" value="Create" class="btn btn-primary"></td>
                    <td></td>
                </tr>
              </tbody>
            </table>
        </form>
    @endsection