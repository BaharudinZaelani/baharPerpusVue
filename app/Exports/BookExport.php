<?php

namespace App\Exports;

use App\Models\Books;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookExport implements FromView
{

    public function view(): View
    {
        return view('exports.books', [
            'books' => Books::all()
        ]);
    }
}
