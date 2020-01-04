<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\basisdatab;
use Validator; 
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;

class NilaiController extends Controller
{
	    public function destroy($id)
    {
        $data = basisdatab::find($id);
        return redirect()->route('nilaimhs')->with('error', 'Data mahasiswa berhasil dihapus!!');
        return redirect()->route('nilaimhs');
    }
	    public function edit($id)
    {
        $hasil = basisdatab::findOrFail($id);
        return view('mhs.edit', ['liat'=>$hasil]);
    }

    public function update(Request $request, $id)
    {
        $hasil = basisdatab::findOrFail($id);
        $this->validate($request, [
        'nama' => 'required|string|max:255',
        'nrp' => 'required|string|max:255',
        'tugas1' => 'required|numeric',
        'tugas2' => 'required|numeric',
        'tugas3' => 'required|numeric',
        'keterangan' => 'nullable|string',
        'photo' => 'mimes:jpeg,png|max:10240'
        ]);

        $data = $request->only('nama', 'nrp', 'tugas1', 'tugas2', 'tugas3', 'keterangan');
        if ($request->hasFile('foto'))
        {
            $data['foto'] = $this->savePhoto($request->file('foto'));
            if ($hasil->foto !== '') $this->deletePhoto($hasil->foto);
        }
            $hasil->update($data);
            
        return redirect()->route('nilaimhs')->with('success',
        'Anda telah berhasil mengedit detail mahasiswa bernama '.$request->get('nama'));
    }

    public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img'
        . DIRECTORY_SEPARATOR . $filename; return File::delete($path);
    }
	    public function create()
    { 
        return view('mhs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'nama' => 'required|string|max:255',
        'nrp' => 'required|string|max:255',
        'tugas1' => 'required|numeric',
        'tugas2' => 'required|numeric',
        'tugas3' => 'required|numeric',
        'keterangan' => 'nullable|string',
        'foto' => 'mimes:jpeg,png|max:10240'
        ]);

        $data = $request->only('nama', 'nrp', 'tugas1', 'tugas2', 'tugas3', 'keterangan');
        if ($request->hasFile('foto'))
        {
            $data['foto'] = $this->savePhoto($request->file('foto'));
        }
            basisdatab::create($data);
        
        return	redirect()->route('nilaimhs')->with('success', 
        'Anda telah berhasil menambahkan mahasiswa baru dengan nama : '.$request->get('nama'));
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
    public function __construct()
    { 
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
	
    public function index(Request $request)
    {
       $q = $request->get('q');
       $hasil = basisdatab::where('nama', 'LIKE', '%'.$q.'%')->orderBy('nama')->paginate(5);
       return view('nilaimhs', ['liat'=>$hasil], ['q'=>$q]);
    }
}