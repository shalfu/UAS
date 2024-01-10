<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use app\Models\mahasiswa;
use illuminate\Support\Facades\Session;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = mahasiswa::where('judul', 'like', "%$katakunci%")
                ->orWhere('judul', 'like', "%$katakunci%")
                ->orWhere('penulis', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = mahasiswa::orderBy('nim', 'desc')->paginate($jumlahbaris);
        }
        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        Session::flash('id', $request->id);
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);
        Session::flash('tahun_terbit', $request->tahun_terbit);
        Session::flash('ISBN', $request->ISBN);
        $request->validate([
            'id' => 'required|numeric|unique:mahasiswa,nim',
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'ISBN' => 'required',
        ], [
            'id.numeric' => 'NIM wajib diisi',
            'judul.required' => 'NIM wajib dalam angka',
            'penulis.requied' => 'NIM yang diisikan sudah ada dalam database',
            'tahun_terbit.numeric' => 'Nama wajib diisi',
            'ISBN.required' => 'Jurusan wajib diisi',
        ]);

        $data =[
            'id', $request->id,
            'judul', $request->judul,
            'penulis', $request->penulis,
            'tahun_terbit', $request->tahun_terbit,
            'ISBN', $request->ISBN,



        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
        ], [
            'judul.required' => 'judul wajib diisi',
            'penulis.required' => 'Penulis wajib diisi',
        ]);
        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
        ];
        mahasiswa::where('id', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan update data');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mahasiswa::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan delete data');
    }
}

