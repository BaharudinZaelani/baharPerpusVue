<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::insert([
            'judul_buku' => 'Tutorial Memesak dengan mudah',
            'penulis' => 'Baharudin Zaelani',
            'penerbit' => 'ruangbuku.com',
            'lower' => 'tutorial_memesak_dengan_mudah',
            'created_at' => Carbon::now()
        ]);
    }
}
