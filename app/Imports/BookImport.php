<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Books;
use Carbon\Carbon;

class BookImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $count = count($collection);
        for($i = 1; $i < $count; $i++){
            Books::insert([
                'judul_buku' => $collection[$i][0],
                'penulis' => $collection[$i][1],
                'penerbit' => $collection[$i][2],
                'lower' => $collection[$i][3],
                'created_at' => Carbon::today()
            ]);
        }
    }
}
