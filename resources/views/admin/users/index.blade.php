
@extends("layouts.admin")


    @section("content")
        <h1>Users</h1>
@if($users)
        <table class="table table-hover">
           <thead>
              <tr>
                <th>Name</th>

                  <th>Role</th>
                  <th>Availability</th>
                  <th>Email</th>
                  <th>Created</th>
                  <th>Updated</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
             <tr>
                <td>{{$user->name}}</td>
                <td>{{ucfirst(strtolower($user->roles->name))}}</td>
                <td>
                    {{$user->is_active?"Active":"Suspended"}}
                </td>

                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
             </tr>
            @endforeach
          </tbody>
        </table>
@endif

    @endsection