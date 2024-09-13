<?php

namespace App\Http\Controllers;

use App\Models\SamplingModel;
use App\Models\FaseKolamModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SamplingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Kelola Data Sampling',
            'paragraph' => 'Berikut ini merupakan data sampling yang terinput ke dalam sistem',
            'list' => [
                ['label' => 'Home', 'url' => route('sampling.index')],
                ['label' => 'sampling'],
            ]
        ];
        $activeMenu = 'sampling';
        $fase_kolam = FaseKolamModel::all();
        return view('sampling.index',['breadcrumb' =>$breadcrumb, 'activeMenu' => $activeMenu, 'fase_kolam' => $fase_kolam]);
    }

    // menampilkan data table    
    public function list(Request $request)
    {
        $samplings = SamplingModel::select('id_sampling', 'kd_sampling', 'tanggal_cek', 'waktu_cek', 'DOC','berat_udang','size_udang', 'interval_hari', 'harga_udang', 'input_fr', 'total_pakan', 'ADG_udang', 'biomassa', 'populasi_ekor', 'catatan','id_fase_tambak', 'created_at', 'updated_at')->with('faseKolam'); 
        return DataTables::of($samplings)
        ->make(true);
    }


    public function create(){
        $breadcrumb = (object) [
            'title' => 'Tambah Data Sampling',
            'paragraph' => 'Berikut ini merupakan form tambah data sampling yang terinput ke dalam sistem',
            'list' => [
                ['label' => 'Home', 'url' => route('dashboard.index')],
                ['label' => 'Sampling', 'url' => route('sampling.index')],
                ['label' => 'Tambah'],
            ]
    ];
    $activeMenu = 'sampling';
    $fase_kolam = FaseKolamModel::all();
    return view('sampling.create',['breadcrumb' =>$breadcrumb, 'activeMenu' => $activeMenu, 'fase_kolam' => $fase_kolam]);
}

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'kd_sampling' => 'required|string|max:255|unique:sampling,kd_sampling',
        'tanggal_cek' => 'required|date',
        'DOC' => 'required|integer',
        'berat_udang' => 'required|integer',
        'size_udang' => 'required|integer',
        'harga_udang' => 'required|integer',
        'biomassa' => 'required|integer',
        'populasi_ekor' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Simpan data ke dalam database
    $samplings = new SamplingModel();
    $samplings->kd_sampling = $request->kd_sampling;
    $samplings->tanggal_cek = $request->tanggal_cek;
    $samplings->DOC = $request->DOC;
    $samplings->berat_udang = $request->berat_udang;
    $samplings->size_udang = $request->size_udang;
    $samplings->harga_udang = $request->harga_udang;
    $samplings->biomassa = $request->biomassa;
    $samplings->populasi_ekor = $request->populasi_ekor;

    // Simpan file image jika ada
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/sampling'), $filename);
        $samplings->image = $filename;
    }

    $samplings->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('sampling.index')->with('success', 'Data sampling berhasil ditambahkan');
}

}


