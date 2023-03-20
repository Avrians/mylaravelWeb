<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
 
class UserController extends Controller
{
    public function index() {
        return view('user-list', [
            'users' => User::all()
        ]);

        // foreach(User::all() as $user) {
        //     // echo $user -> name.'|'.$user-> email.'<br>'
        //     'users' => User::all()
        // };
    }
    public function add() {
        return view('user-add');
    }
    
    public function edit($id) {
        return view('user-edit');
    }

    public function store() {
        $user = new User;
        $user->name = 'Monkey D Luffy';
        $user->email = 'will@onepiece.com';
        $user->save();
    }
    public function update($id) {
        $user = User::where('name', 'Monkey D Luffy')->first();
        $user->email = 'will@onepiece.com';
        $user->save();
    }

    public function delete($id) {
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