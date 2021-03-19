<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
public function we()
{
    $count = Buku::count();

    return 
    view('dashboard')->with('count', $count);
}
        
        
}
