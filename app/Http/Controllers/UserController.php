<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () {

        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id == '1') {

                $all_users = User::all();

                return view('users.index', [

                    'users' => $all_users

                ]);

            } else {

                return redirect()->route('index');

            }

        }

    }

    public function profile () {

        return view('users.profile');

    }

    public function edit ($id) {

        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id == '1') {

                $selected_user = User::find($id);

                return view('users.edit', [

                    'user' => $selected_user

                ]);

            }

        }

    }

    public function update (Request $request, $id) {

        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id == '1') {

                //Aggiungo record nel database
                $user = User::find($id);

                $user->name = $request->nome;
                $user->email = $request->email;

                $user->save();

                //Aggiungo ruolo
                $user->roles()->detach();

                $user->roles()->attach($request->ruolo);

                return redirect()->route('users.index');

            } else {

                return redirect()->route('index');

            }

        }

    }

    public function destroy ($id) {

        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id == '1') {

                //Elimino record dal database
                $user = User::find($id);

                $user->delete();

                return redirect()->route('users.index');

            } else {

                return redirect()->route('index');

            }

        }

    }
}
