<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        // Kode untuk pencarian
        $query = Content::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $contents = $query->get();

        // Kode alternatif untuk mengambil semua konten (tidak aktif)
        // $contents = Content::all();

        return view('viewcontent', compact('contents'));

        // Kode di bawah ini tidak akan pernah dijalankan karena ada return sebelumnya
        // $query = Content::query();
    }

    public function create()
    {
        return view('createcontent'); // 'createcontent' adalah nama file view Anda untuk form pembuatan konten
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi file
            'link' => 'required'
        ]);
    
        $content = new Content();
        $content->name = $request->name;
        $content->desc = $request->desc;
        $content->link = $request->link;
        $content->id_users = Auth::id();
    
        // Menangani file yang diunggah
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $content->logo_path = 'img/' . $filename;
        }
    
        $content->save();
    
        session()->flash('success', 'Content Berhasil ditambahkan');
        return redirect('/dashboard');
    }
    
    public function destroy($id)
    {
        $content = Content::find($id);

        // Periksa apakah user saat ini adalah pemilik konten
        if ($content && Auth::id() == $content->id_users) {
            // Periksa dan hapus file gambar jika ada
            if ($content->logo_path && file_exists(public_path($content->logo_path))) {
                unlink(public_path($content->logo_path));
            }
    
            $content->delete();
            return redirect('/viewcontent')->with('success', 'Content berhasil dihapus');
        }

        return back()->with('error', 'Anda tidak memiliki izin untuk menghapus konten ini');
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('editcontent', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);
        $content->name = $request->name;
        $content->desc = $request->desc;
        $content->link = $request->link;

    // Menangani file yang diunggah
    if ($request->hasFile('logo')) {
        // Menghapus file logo lama jika ada
        if ($content->logo_path && file_exists(public_path($content->logo_path))) {
            unlink(public_path($content->logo_path));
        }

        // Simpan file logo baru
        $file = $request->file('logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $filename);
        $content->logo_path = 'img/' . $filename;
    }

    $content->save();

        return redirect('/viewcontent')->with('success', 'Konten berhasil di-update');
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        return view('viewcontentbyid', compact('content'));
    }
}
