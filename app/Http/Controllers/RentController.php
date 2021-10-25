<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Rents;
use App\Models\Books;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\RentDum;

class RentController extends Controller
{
    public function rent($id)
    {
        $userId = $id . Auth::user()->id;
        $book = Books::find($id);
        $rent = Rents::where('id_pinjaman', $userId)->get();
        if( $rent->count() > 0){
            return redirect('/dashboard')->with('book', 'OOPS!, gagal dipinjam buku sudah ada .');
        }
        $rentH = new RentDum();
        $rentH->rentt($book->judul_buku);
        Rents::insert([
            'id_pinjaman' => $book->id . Auth::user()->id,
            'nama_peminjam' => Auth::user()->name,
            'judul_buku' => $book->judul_buku,
            'expired' => Carbon::tomorrow(),
            'created_at' => Carbon::now()
        ]);
        return redirect('/dashboard')->with('book', 'Berhasil dipinjam !');
    }
}
