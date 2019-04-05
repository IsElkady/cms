<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Role;
use App\User;
use App\Photo;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $users = User::all();           //get all users
        $i=0;
        return view("admin.users.index",compact("users","i")); //Pass all users to views
       // }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::all();  //to fill up ddlRoles dropdown list with available roles

        return view("admin.users.create",compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        //$this->validate($request,['txtName'=>"required","txtPassword"=>"required|min:6"]);

        $input=$request->all();

        if($file=$request->file("photo"))
        {

            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(["path"=>$name]);

            $input["photo"]=$photo->id;
        }
        else{
            $input["photo"]=0;
        }
        //$input["txtPassword"]=bcrypt($input["txtPassword"]);
//echo $input["fimage"];
        //User::create($request->all());
        //User::create(["name"=>$request->txtName,"email"=>$request->txtEmail,"password"=>$request->txtPassword,"role_id"=>$request->get("ddlRoles"),"is_active"=>($request->input("chkActive")=="on")?1:0,"photo_id"=>$request->file("photo")]) ;

        //User::create($input);
        User::create(["name"=>$request->txtName,"email"=>$request->txtEmail,"password"=>bcrypt($request->txtPassword),"role_id"=>$request->get("ddlRoles"),"is_active"=>($request->input("chkActive")=="on")?1:0,"photo_id"=>$input["photo"]]) ;
        $roles=Role::all();

        return view("admin.users.create",compact("roles"));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::find($id);
        $roles=Role::all();
        return view("admin.users.edit",compact("roles","user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, $id)
    {
        //
        $user=User::find($id);


        $input=$request->all();

        if($file=$request->file("photo"))
        {

            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(["path"=>$name]);

            $input["photo"]=$photo->id;
        }
        else{

            $input["photo"]=$user->photo_id;
        }


        $user->update(["name"=>$request->txtName,"password"=>bcrypt($request->txtPassword),"email"=>$request->txtEmail,"is_active"=>($request->input("chkActive")=="on")?1:0,"role_id"=>$request->get("ddlRoles"),"photo_id"=>$input["photo"]]);

        return redirect ("admin/users");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
