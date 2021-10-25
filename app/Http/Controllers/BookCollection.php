<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Resources\BookResource;
use Carbon\Carbon;
use App\Http\Controllers\ToolsController as Tools;
use Firebase\JWT\JWT;

class BookCollection extends Controller
{
    public function cekToken($token){
        if( isset($token) ){
            $deco = JWT::decode($token, $this->key, array('HS256'));
            if ( isset($deco->username) ){
                $expired = $deco->expired;
                if( $expired != Carbon::now()->day ){

                }else {
                    echo 'Token Expired';
                    die;
                }
            }else {
                echo 'Token Tidak Valid!';
                die;
            }
        }else {
            echo 'Harap masukan TOKEN';
            die;
        }
    }

    public function index($token){
        $this->cekToken($token);
        $books = Books::all();
        return BookResource::collection($books);
    }


    public function findbyTitle($judul,$token){
        $this->cekToken($token);
        $book = Books::where('judul_buku', $judul)->get();
        if ( $book->count() == 0 ){
            return [
                'Status' => '404',
                'Message' => 'Not Found'
            ];
        }
        return $book;
    }

    public function findByPenulis($penulis, $token){
        $this->cekToken($token);
        $book = Books::where('penulis', $penulis)->get();
        if ( $book->count() == 0 ){
            return [
                'Status' => '404',
                'Message' => 'Not Found'
            ];
        }
        return $book;
    }

    public function findById($id, $token){
        $this->cekToken($token);
        $book = Books::where('id', $id)->get();
        if ( $book->count() == 0 ){
            return [
                'Status' => '404',
                'Message' => 'Not Found'
            ];
        }
        return $book;
    }

    public function getByLower($lower, $token){
        $this->cekToken($token);
        $book = Books::where('lower', $lower)->get();
        if( $book->count() == 0 ){
            return [
                'Status' => '404',
                'Message' => 'Not Found'
            ];
        }
        return $book;
    }

    public function delete($id){
        $book = Books::where('id', $id)->get();
        $count = $book->count();
        if( $count >= 1 ){
            $d = Books::find($id);
            $d->delete();
            return [
                'Status' => '200',
                'Message' => 'Terhapus'
            ];
        }
        return [
            'Status' => '404',
            'Message' => 'Data tidak ditemukan !'
        ];
    }

    public function tambahBuku($judul, $url, $penerbit, $penulis){
        $tools = new Tools();
        if ( !isset($judul) ){
            return false;
        }else if ( !isset($url) ){
            $url = $tools->lower($judul);
        }else if ( !isset($penerbit) ){
            return false;
        }
        else if ( !isset($penulis) ){
            return false;
        }
        Books::insert([
            'judul_buku' => $judul,
            'lower' => $url,
            'penerbit' => $penerbit,
            'penulis' => $penulis,
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

        return true;
    }

    public function update($id, $judul, $url, $penerbit, $penulis){
        if( isset($id) ){
            $book = Books::find($id);
            if( $book == null ){
                return [
                    'Status' => '404',
                    'Message' => 'Data tidak ditemukan !'
                ];
            }else if( $url || $penerbit || $penulis ){
                if ( isset($judul) ){
                    $book->judul_buku = $judul;
                }
    
                if ( isset($url) ){
                    $book->lower = $url;
                }
                
                if ( isset($penerbit) ){
                    $book->penerbit = $penerbit;
                }
    
                if ( isset($penulis) ){
                    $book->penulis = $penulis;
                }
    
                $book->updated_at = Carbon::now();
                
                $book->save();
    
                return [
                    'Status' => '200',
                    'Message' => "$id Telah siubah"
                ];
            }else {
                return[
                    'Pesan dari bahar' => 'data ditemukan tapi anda tidak mengubah apa-apa',
                    'data' => $book
                ];
            }
        }
    }
}
