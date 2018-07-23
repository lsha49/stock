<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Session;
use Redirect;
use App\User;
use App\Http\Services\service1;



// This contains legacy code 
class UserController extends Controller
{

    public function userMan()
    {
      $users = User::all();
      return view('auth.userMan')
          ->with('users', $users);
    }


    public function edit($id)
    {
      $user = User::find($id);
      return view('auth.edit', array('user' => $user));
    }


    public function update($id)
    {
          $user = User::find($id);
          $user->name       = Input::get('name');
          $user->email      = Input::get('email');
          $user->save();
          Session::flash('message', 'Successfully updated nerd!');
          return Redirect::to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      Session::flash('message', 'Successfully deleted!');
      return Redirect::to('users');
    }























}
