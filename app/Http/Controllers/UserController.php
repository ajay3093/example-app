<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
public function dashboard(Request $request)
{

 $userdata = array(
          'email' => $request->email ,
          'password' => $request->password
        );

  if (Auth::attempt($userdata))
          {
        return 'success';
          }
          else
          {
          // validation not successful, send back to form
          return 'fail';
          }

}
    public function register()
    {

    return view('user.reg');

    }

public function registration(Request $request)
{
   // dd($request);
   $data = new User;
   $data->fname=$request->firstname;
   $data->lname=$request->lastname;
   $data->phone=$request->phone;
   $data->email=$request->email;
   $data->password=bcrypt($request->password);
   $data->save();
   return redirect('reg');
}



}
