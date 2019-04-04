<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Role;
use App\User;
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

        return view("admin.users.index",compact("users")); //Pass all users to views
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
    public function fupload(string $fimage)
    {
        if($file=$fimage)
        {
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            return $name;
        }
        return "";
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

            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $input["photo"]=$name;
        }

//echo $input["fimage"];
        //User::create($request->all());
        User::create(["name"=>$request->txtName,"email"=>$request->txtEmail,"password"=>$request->txtPassword,"role_id"=>$request->get("ddlRoles"),"is_active"=>($request->input("chkActive")=="on")?1:0,"photo_id"=>$request->file("photo")]) ;
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
