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

class UserController extends Controller
{

    public function userMan()
    {
      // get all the nerds
      $users = User::all();

      // load the view and pass the nerds
      return view('auth.userMan')
          ->with('users', $users);
    }


    public function edit($id)
    {
      // get the nerd
      $user = User::find($id);

      // show the edit form and pass the nerd
      return view('auth.edit', array('user' => $user));
    }


    public function update($id)
    {
      // validate
      // read more on validation at http://laravel.com/docs/validation
      $rules = array(
        'id'       => 'required',
        'name'      => 'required',
        'email' => 'required'
      );
    //  $validator = Validator::make(Input::all(), $rules);

      // process the login
      //if ($validator->fails()) {
      //    return Redirect::to('nerds/' . $id . '/edit')
      //        ->withErrors($validator)
      //        ->withInput(Input::except('password'));
      //} else {
          // store
          $user = User::find($id);
          //$user->id       = Input::get('id');
          $user->name       = Input::get('name');
          $user->email      = Input::get('email');
          $user->save();

          // redirect
          Session::flash('message', 'Successfully updated nerd!');
          return Redirect::to('users');
      //}
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

      // redirect
      Session::flash('message', 'Successfully deleted the car!');
      return Redirect::to('users');
    }




    public function sqlSearch()
    {
      $urlValue = 'usersearchResult';
      return view('others.sqlSearch') -> with('urlValue', $urlValue);
    }

    public function sqlsearchResult()
    {
      $id = Input::get('id');
      $modelName = new User;

      $user = service1::sqlResult($modelName,$id);

      return view('auth.show', array('users' => $user));
    }























}
