<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\basisdatab;
use Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;

class nilaiController extends Controller
{

    public function __construct()
    { 
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    
    
    public function show_data(){
        $nilai = DB::table('basisdatabs')
            ->select(DB::raw('nrp, nama, floor(avg(tugas1+tugas2+tugas3)/3) total'))
            ->groupBy('nrp')
            ->orderBy('total','desc')
            ->limit(5)
            ->get();

        return view('show_data',['nilai' => $nilai]);
    }

    // public function index(Request $request){
    //     $q = $request->get('q');
    //     $hasil = basisdatab::where('nama', 'LIKE', '%'.$q.'%')->orderBy('nama')->paginate(5);
    //     return view('show_ci', ['data'=>$hasil], ['q'=>$q]);
    // }

    public function show_ci(Request $request){
        $q = $request->get('q');
        $data = DB::table('basisdatabs')->where('nama', 'LIKE', '%'.$q.'%')->orderBy('nama')->paginate(5);
        
        // mengirim data ke view index
        return view('show_ci', ['data'=>$data], ['q'=>$q]);
    }


    public function index(Request $request){
        $q = $request->get('q');
        $data = DB::table('basisdatabs')->where('nama', 'LIKE', '%'.$q.'%')->orderBy('nama')->paginate(5);
        
        // mengirim data ke view index
        return view('nilaimhs', ['data'=>$data], ['q'=>$q]);
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

    public function destroy($id)
    {
        $data = basisdatab::find($id);
        if ($data->foto !== '') $this->deletePhoto($data->foto);
        $data->delete();
        return redirect()->route('nilaimhs')->with('error', 'Data mahasiswa berhasil dihapus!!');
        return redirect()->route('nilaimhs');
    }
    
}