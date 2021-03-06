<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::where([
            ['nim', '!=', null, 'OR', 'nama', '!=', null], 
            [function ($query) use ($request) {
                if (($keyword = $request->keyword)) {
                    $query->orWhere('nama', 'LIKE', '%' . $keyword . '%')->get(); 
                }
            }]
        ])
            ->orderBy('nim', 'desc')
            ->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas')) -> 
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('mahasiswas.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
            $request->validate([
                'NIM' => 'required',
                'Nama' => 'required',
                'Kelas' => 'required',
                'Jurusan' => 'required',
                'No_Handphone' => 'required',
                'E' => 'required',
                'Tgl_lahir' => 'required',
            ]);
        
            //fungsi eloquent untuk menambah data
            Mahasiswa::create($request->all());
           
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('mahasiswas.index')
                ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    
    public function show($NIM)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
            $Mahasiswa = Mahasiswa::find($NIM);
            return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    
    public function edit($NIM)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
            $Mahasiswa = Mahasiswa::find($NIM);
            return view('mahasiswas.edit', compact('Mahasiswa'));
    }

    
    public function update(Request $request, $NIM)
    {
            //melakukan validasi data
                $request->validate([
                    'NIM' => 'required',
                    'Nama' => 'required',
                    'Kelas' => 'required',
                    'Jurusan' => 'required',
                    'No_Handphone' => 'required',
                ]);

            //fungsi eloquent untuk mengupdate data inputan kita
                 Mahasiswa::find($NIM)->update($request->all());

            //jika data berhasil diupdate, akan kembali ke halaman utama
                return redirect()->route('mahasiswas.index')
                ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    
    public function destroy($NIM)
    {
        //fungsi eloquent untuk menghapus data
            Mahasiswa::find($NIM)->delete();
            return redirect()->route('mahasiswas.index')
                -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
