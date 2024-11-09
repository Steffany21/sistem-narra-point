<?php

namespace App\Http\Controllers;

use App\Models\dataMaster;
use App\Models\transaction;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request)
    {
      // Mengambil keyword dari request
      $keyword = $request->input('keyword'); 
      $numberrow = 8;

      $query = transaction::query();
      // Jika keyword ditemukan, lakukan pencarian berdasarkan keyword
      if (!empty($keyword)) {
        $query->where('number_phone', 'like', "%$keyword%")
        ->orWhere('customer_name', 'like', "%$keyword%");
      }

        // Jika tidak ada keyword, ambil semua data
        $transaction = $query->orderBy('number_phone', 'desc')->paginate($numberrow);
      
        
      // Kirim data ke view
      return view('dashboard.test', compact('transaction'));
    }
}
