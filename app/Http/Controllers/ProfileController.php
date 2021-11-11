<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('profile/index');
    }

    public function loginProfile(){
        return view('profile/login');
    }

    public function cekAuth(Request $request){

        $data = DB::table('tb_anggota')->where('email',$request->email)->firstOrFail();
        if($data){
            if(Hash::check($request->password, $data->password)){
                return redirect('/profile');
            }
        }
    }
}


