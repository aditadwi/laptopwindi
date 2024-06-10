<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProdukController extends Controller
{
    public function index()
    {
        $produk=Produk::all();
        return view('produk.index',[
            "title"=>"Produk",
            "data"=>$produk
        ]);
    }

    public function create():view
    {
        return view('produk.create')->with([
            "title"=>"Tambah Data Produk",
            "data"=>Produk::all()
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "stok"=>"required",
            "harga"=>"required"
        ]);
        Produk::create($request->all());
        return redirect()->route('produk.index')->with('success','Data Produk Berhasil Ditambahkan');
    }

    public function edit(Produk $produk):View
    {
        return view('produk.edit',compact('produk'))->with([
            "title"=>"Ubah Data Produk",
            "data"=>Produk::all()
        ]);
    }

    public function update(Produk $produk,Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "stok"=>"required",
            "harga"=>"required"
        ]);
        $produk->update($request->all());
        return redirect()->route('produk.index')->with('updated','Data Produk 
        Berhasil Ditambahkan');

    }

    public function show():View
    {
        $produk=Produk::all();
        return view('produk.show')->with([
            "title"=>"Tampil Data Produk",
            "data"=>$produk
        ]);
    }

    public function destroy($id):RedirectResponse
    {
        Produk::where('id',$id)->delete();
        return redirect()->route('produk.index')->with('deleted','Data Produk Berhasil Dihapus');
    }
}