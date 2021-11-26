<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
        $user = DB::table('users')->where('level','A')->get();
        return view('user/index',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'A'
            ]);
        
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $admin = DB::table('users')->where('id',$id)->first();
        return view('user/edit',compact('admin'));
    }

    public function update(Request $request)
    {
        
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);

        return redirect('user')->with('update','Data Berhasil Di Update');
    }

    #kasir

    public function index2()
    {
        
        $user = DB::table('users')->where('level','K')->get();
        return view('kasir/index',compact('user'));
    }

    public function store2(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'K'
            ]);
        
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit2($id)
    {
        $kasir = DB::table('users')->where('id',$id)->first();
        return view('kasir/edit',compact('kasir'));
    }

    public function update2(Request $request)
    {
        
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);

        return redirect('kasir')->with('update','Data Berhasil Di Update');
    }

    public function delete2($id){
        DB::table('users')->where('id',$id)->delete();

        return redirect('kasir');
    }

    public function storeAnggota(Request $request){

            DB::table('tb_anggota')->insert([
                'id_anggota'=>'',
                'kode_rfid' => $request->rfid,
                'nama_anggota'=> $request->name,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'saldo_tunai' => 0,
            ]);
        
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function indexAnggota()
    {
        $anggota = DB::table('tb_anggota')->get();
        return view('anggota/index',compact('anggota'));
    }

    public function deleteAnggota($id){
        DB::table('tb_anggota')->where('kode_rfid', $id)->delete();

        return redirect('anggota');
    }

    public function editAnggota($id){
        $anggota = DB::table('tb_anggota')->where('kode_rfid',$id)->first();

        return view('anggota/edit',compact('anggota'));
    }

    public function updateAnggota(Request $request){

        DB::table('tb_anggota')->where('id_anggota',$request->id)->update([
            'kode_rfid'=>$request->rfid,
            'nama_anggota'=>$request->name,
            'email'=>$request->email
        ]);

        return redirect('anggota')->with('update','Data berhasil di Update');
    }

    public function topupSaldo($id){
        $anggotaSaldo = DB::table('tb_anggota')->where('kode_rfid',$id)->first();

        return view('anggota/topup',compact('anggotaSaldo'));
    }

    public function updateSaldo(Request $request){

        $saldoakhir = $request->saldoawal + $request->saldotambah;

        DB::table('tb_anggota')->where('id_anggota',$request->id)->update(['saldo_tunai'=>$saldoakhir,]);

        return redirect('anggota')->with('update','Saldo Berhasil di Top Up');
    }

    public function loginAnggota(){

        return view('profile/login');
    
    }

    public function indexReferensi(){
        $user_ref = DB::table('tbl_user_reference')->get();
        $kelas = DB::table('tbl_kelas')->get();
        return view('referensi/index',compact('user_ref','kelas'));
    }

    public function addReferensi(Request $request){

        $text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123457890';
        $panj = 7;
        $txtl = strlen($text)-1;
        $koderef= '';
        for($i=1; $i<=$panj; $i++){
            $koderef .= $text[rand(0, $txtl)];
        }

        DB::table('tbl_user_reference')->insert([
            'id_user_ref'=>'',
            'nama'=> $request->name,
            'no_hp'=> $request->no_hp,
            'email' => $request->email,
            'tipe_ref' => $request->tipe_ref,
            'kelas' => $request->kelas,
            'sekolah' => $request->sekolah,
            'ref_code' => $koderef
        ]);
    
    return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }
}
