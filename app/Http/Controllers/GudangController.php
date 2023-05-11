<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\Produk;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('gudang.index');
    }

    public function data(){
        $gudang = Gudang::orderBy('id_gudang', 'desc')->get();

        return datatables()
            ->of($gudang)
            ->addIndexColumn()
            ->addColumn('ukuran_gudang', function ($gudang) {
                return $gudang->ukuran_gudang .' m³';
            })
            ->addColumn('aksi', function ($gudang) {
                return '
                <div class="btn-group">
                <button type="button" onclick="showDetail(`'. route('gudang.showDetailProduk', $gudang->id_gudang) .'`)" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-eye"></i></button>
                    <button type="button" onclick="editForm(`'. route('gudang.update', $gudang->id_gudang) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('gudang.destroy', $gudang->id_gudang) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $gudang = Gudang::create($request->all());

        return redirect()->route('gudang.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */

     public function showDetailProduk(string $id){
        $detail = Produk::where('id_gudang', $id)
        ->leftJoin('kategori', 'kategori.id_kategori', 'produk.id_kategori')
        ->select('produk.*', 'nama_kategori')
        ->orderBy('kode_produk', 'asc')
        ->get();

        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('kode_produk', function ($detail) {
                return '<span class="label label-success">'. $detail->kode_produk .'</span>';
            })
            ->addColumn('harga_beli', function ($detail) {
                return uang_indonesia($detail->harga_beli);
            })
            ->addColumn('harga_jual', function ($detail) {
                return uang_indonesia($detail->harga_jual);
            })
            ->addColumn('stok', function ($detail) {
                return uang_indonesia($detail->stok);
            })
            ->addColumn('ukuran_produk', function ($detail) {
                return $detail->ukuran_produk .' m³';
            })
            ->rawColumns(['kode_produk'])
            ->make(true);
     }

    public function show(string $id)
    {

        $gudang = Gudang::find($id);

        return response()->json($gudang);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $gudang = Gudang::find($id)->update($request->all());

        return redirect()->route('gudang.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Gudang::find($id)->delete();

        return response(null, 204);
    }
}
