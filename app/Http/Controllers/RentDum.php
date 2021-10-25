<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRent;
use Carbon\Carbon;

class RentDum extends Controller
{
    public function rentt($judul)
    {
        BookRent::insert([
            'judul_buku' => $judul,
            'created_at' => Carbon::now()
        ]);
    }
}
