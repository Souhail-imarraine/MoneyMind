<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all()->where('role', '!=', 'admin');
        return view('admin.users', compact('users'));
    }


    public function destroy($id){

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès');
    }


}
