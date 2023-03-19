<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
 
class UserController extends Controller
{
    public function index() {
        foreach(User::all() as $user) {
            echo $user -> name.'|'.$user-> email.'<br>';
        }
    }

    public function store() {
        $user = new User;
        $user->name = 'Monkey D Luffy';
        $user->email = 'will@onepiece.com';
        $user->save();
    }
    public function update() {
        $user = User::where('name', 'Monkey D Luffy')->first();
        $user->email = 'will@onepiece.com';
        $user->save();
    }

    public function delete() {
        $user = User::where('name', 'Monkey D Luffy')->first();
        $user->delete();
    }

    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}