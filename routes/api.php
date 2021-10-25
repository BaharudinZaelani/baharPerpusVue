<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCollection as Books;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('book', function(Request $request){
    $bookCollection = new Books();
    if ( isset($request->token) ){
        if( count($request->all()) >= 1 ){
            if( isset($request->judul) ){
                return $bookCollection->findByTitle($request->judul, $request->token);
            }else if ( isset($request->penulis) ) {
                return $bookCollection->findByPenulis($request->penulis, $request->token);
            }else if ( isset($request->id) ) {
                return $bookCollection->findById($request->id, $request->token);
            }else if ( isset($request->token) ) {
                $all = new Books();
                return $all->index($request->token);
            }else {
                return [
                    'Pesan dari bahar' => 'Key salah :(',
                    'Key List' => [
                        'judul' => 'Cari Buku dengan judul',
                        'Penulis' => 'Cari Buku yang ditulis oleh Penulis',
                        'id' => 'Cari buku dengan ID'
                    ]
                ];
            }
        }else {
            $all = new Books();
            return $all->index($request->token);
        }
    }else {
        return [
            'pesan dari bahar' => 'Harap masukan token'
        ];
    }
});

Route::delete('book', function(Request $request){
    $bookCollection = new Books();
    return $bookCollection->delete($request->id);
});

Route::put('book', function(Request $request){
    $bookCollection = new Books();
    if( isset($request->id) || isset($request->judul) ){
        return $bookCollection->update($request->id, $request->judul , $request->url, $request->penerbit, $request->penulis);
    }
    return [
        'Pesan dari bahar' => 'Key yang wajib diisi :',
        'Key List' => [
            'id' => 'Untuk mencari buku dengan ID'
        ]
    ];
});

route::post('book', function(Request $request){
    $bookCollection = new Books();
    $tambah = $bookCollection->tambahBuku($request->judul, $request->url, $request->penerbit, $request->penulis);
    if( $tambah ){
        return [
            'Status' => '200 OK',
            'Pesan dari bahar' => 'Sukses ditambahkan :3'
        ];
    }else {
        return [
            'Pesan dari bahar' => 'Key Salah :(',
            'Key List' => [
                'judul' => 'memberikan judul untuk buku',
                'url' => 'custom url',
                'penerbit' => 'penerbit',
                'penulis' => 'penulis buku'
            ]
        ];
    }
});