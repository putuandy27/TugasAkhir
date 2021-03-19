<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::get();

        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::get();
        $user = User::get();

        return view('peminjaman.create', compact('buku', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Peminjaman::create([
            'id_buku' => $request->id_buku,
            'id_admin' => Auth::user()->id,
            'id_user' => $request->id_user,
            'tanggal_kembali' => $request->tanggal_kembali
        ]);

        return redirect('/peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::with('buku', 'admin', 'user')->where('id', $id)->first();

        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
        $peminjaman = Peminjaman::with('user', 'admin', 'buku')->where('id', $id)->first();
        // $user = Auth::user()->name;
        $buku = Buku::get();

        return view('peminjaman.edit', compact('peminjaman', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);

        $peminjaman->id_buku = $request->id_buku;
        // $peminjaman->id_admin = $request->id_admin;
        // $peminjaman->id_user = $request->id_user;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;

        $peminjaman->save();

        return redirect('/peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);

        $peminjaman->delete();

        return redirect('/peminjaman');
    }
}
