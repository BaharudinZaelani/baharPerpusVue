<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\BookRent as RentDum;
use Carbon\Carbon;
use App\Models\Books;
use App\Models\Rents;
use App\Exports\BookExport;
use App\Imports\BookImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ToolsController as Tools;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;
use Firebase\JWT\JWT;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    // VUE dashboard
    public function vueDashboard(){
        view('dashboard/vue');
        return redirect('/vue/dashboard');
    }

    public function index(){
        if( Auth::user()->role != 'admin' ){
            $books = Books::all();
            $rents = Rents::where('nama_peminjam', Auth::user()->name)->get();

            // expired
            $rentEx = Rents::where('expired', 'like', Carbon::today())->get();
            $expiredRent = count($rentEx);
            if(  $expiredRent > 0 ){
                for( $i = 0; $i < $expiredRent; $i++ ){
                    $this->destroy($rentEx[0]->id);
                    return redirect('/dashboard');
                }
            }else{
                // dd($rents[0]->created_at->day <= Carbon::today()->day);
                for( $i = 0; $i < count($rents); $i++ ){
                    if( $rents[$i]->created_at->day < Carbon::today()->day ){
                        $this->destroy($rents[$i]->id);
                        return redirect('/dashboard');
                    }
                }
            }

            // API TOKEN
            $key = $this->key;
            $payload = array(
                'username' => Auth::user()->name,
                'role' => Auth::user()->role,
                'expired' => Carbon::tomorrow()->day
            );
            $token = JWT::encode($payload, $key);
            
            $tools = new Tools();
            return view('dashboard.homeUser', [
                'buku' => $books,
                'pinjam' => $rents,
                'token' => $token
            ]);
        }else {
            // chart pinjam 
            $rent = RentDum::all();
            $month = [];
            $month[0] = 0;
            $month[1] = 0;
            $month[2] = 0;
            $month[3] = 0;
            $month[4] = 0;
            $month[5] = 0;
            $month[6] = 0;
            $month[7] = 0;
            $month[8] = 0;
            $month[9] = 0;
            $month[10] = 0;
            $month[11] = 0;
            $month[12] = 0;
            for($i = 0; $i <= 12; $i++){
                if( isset($rent[$i]) ){
                    if( $rent[$i]->created_at->month ){
                        $month[$rent[$i]->created_at->month]++;
                    }
                }
            }
            // dd($month);
            $buku = Books::all();
            return view('dashboard/homeAdmin', [
                'buku' => $buku,
                'january' => $month[1],
                'february' => $month[2],
                'maret' => $month[3],
                'april' => $month[4],
                'mei' => $month[5],
                'juni' => $month[6],
                'juli' => $month[7],
                'agustus' => $month[8],
                'september' => $month[9],
                'november' => $month[10],
                'oktober' => $month[11],
                'desember' => $month[12]
            ]);
        }
    }

    // admin
    public function exportBook(){
        return Excel::download(new BookExport, 'Books-export-ruangbuku.xlsx');
    }

    public function importBook(){
        Excel::import(new BookImport, request()->file('file'));
        return redirect('/dashboard')->with('book', 'All good! Import');
    }

    // user
    public function destroy($id)
    {
        $rent = Rents::find($id);
        $rent->delete();
    }

    public function logoutVue(){
        Auth::logout();
        return redirect('/vue');
    }
}
