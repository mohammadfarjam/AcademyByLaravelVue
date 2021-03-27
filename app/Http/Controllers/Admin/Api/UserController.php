<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $get_info_users=User::with('roles')->orderBy('id', 'DESC')->get();
         return response()->json($get_info_users,200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    public function add_user(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|min:8',
            'role'=>'required'
        ],[
            'name.required'=>'لطفا نام کاربری خود را وارد نمایید.',
            'password.required'=>'لطفا رمز عبور خود را وارد نمایید.',
            'password.min'=>'رمز عبور باید بیش از 8 کاراکتر باشد.',
            'email.required'=>'ایمیل خود را وارد نمایید.',
            'email.email'=>'ایمیل خود را صحیح وارد نمایید.',
            'email.unique'=>'آدرس ایمیل قبلا ثبت شده است.',
            'role.required'=>'نقش کاربر را انتخاب نمایید',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 401);
        } else {

        $new_user=new User();
        $new_user->name=$request['name'];
        $new_user->email=$request['email'];
        $new_user->password=Hash::make($request['password']);
        $new_user->save();

        $new_user->roles()->attach($request['role']);
    }
    }

    public function get_roles()
    {
        $roles=Role::all();
        return response()->json($roles,200);

    }

}
