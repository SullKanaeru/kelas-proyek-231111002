<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class DashboardController extends Controller
{
    // Memunculkan view dashboard, tambah data, dan edit data
    public function index(){
        $data['judul'] = "Dashboard";

        $mahasiswa = new Mahasiswa();
        $data['mahasiswa'] = $mahasiswa->get_all_mhs();
        // dd($data);
        
        return view('templates.header', $data).
        view('dashboard', $data).
        view('templates.footer');
    }
    
    public function add_index(){
        $data['judul'] = "Tambah Data Mahasiswa";

        return view('templates.header', $data).
        view('add_mahasiswa', $data).
        view('templates.footer');
    }
    
    public function edit_index($nrp) {
        $data['judul'] = "Edit Data Mahasiswa";
    
        $mahasiswa = new Mahasiswa();
        $data['detail'] = $mahasiswa->get_mhs($nrp);
        // dd($data);

        return view('templates.header', $data).
        view('edit_mahasiswa', $data).
        view('templates.footer');
    }

    // Mengatur logika
    public function add_mahasiswa(request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nrp' => 'required',
            'nama' => 'required',
            'email' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $nrp = $request -> nrp;
        $nama = $request -> nama;
        $email = $request -> email;
        $mahasiswa = new Mahasiswa();

        // Cek NRP
        if($mahasiswa->cek_nrp($nrp) != 0) {
            return redirect()->back()->withInput()->with('fail', 'Maaf NRP Sudah Digunakan'); 

            // Jika ada, maka jalankan
        } else if($mahasiswa->add_mhs($nrp, $nama, $email)) {
            return redirect("/dashboard")->with('success', 'Berhasil Menambah Data');
        } else {
            return redirect()->back()->with('fail', 'Gagal Menambah Data');
        }
        
        // dd($data['nama']);
    }

    public function edit_mahasiswa(request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nrp' => 'required',
            'nama' => 'required',
            'email' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }


        $nrp = $request -> nrp;
        $nama = $request -> nama;
        $email = $request -> email;
        $mahasiswa = new Mahasiswa();

        if($mahasiswa->edit_mhs($nrp, $nama, $email)) {
            return redirect("/dashboard")->with('success', 'Berhasil Mengubah Data');
        } else {
            return redirect()->back()->with('fail', 'Gagal Menambah Data');
        }
        
        // dd($data['nama']);
    }


    public function delete_index($nrp) {
        $mahasiswa = new Mahasiswa();

        if($mahasiswa->delete_mhs($nrp)) {
            return redirect()->back()->with("success", "Berhasil Menghapus data");
        } else {
            return redirect()->back()->with("fail", "Gagal Menghapus Data");
        }
    }

}
