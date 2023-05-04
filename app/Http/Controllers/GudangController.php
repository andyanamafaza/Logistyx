<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gudang;

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
            ->addColumn('aksi', function ($gudang) {
                return '
                <div class="btn-group">
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
    public function show(string $id)
    {
        //
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
