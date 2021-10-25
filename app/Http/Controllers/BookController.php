<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\RentController as Rent;
use App\Http\Resources\Book;
use App\Models\Rents;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lower = preg_replace('/\s+/', '_', $request->judul_buku);
        $lower = strtolower($lower);
        Books::insert([
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'lower' => $lower,
            'created_at' => Carbon::now() 
        ]);

        return redirect('/dashboard')->with('book', 'Buku berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lower)
    {
        // if( $this->cekAdmin() != true ){
        //     return redirect('/dashboard');
        // }
        // dd($lower);
        $buku = Books::where('lower', $lower)->firstOrFail();
        return view('books.bookShow', compact('buku'));
    }

    public function tambahShow()
    {
        return view('books.tambahShow');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( $this->cekAdmin() != true ){
            return redirect('/dashboard');
        }
        $buku = Books::find($id);
        $buku->delete();
        if ( $this->cekAdmin() ){
            return redirect('/dashboard')->with('book', 'Data Berhasil Dihapus');
        }
        return redirect('/dashboard')->with('book', 'Data Berhasil Dihapus');
    }
}
