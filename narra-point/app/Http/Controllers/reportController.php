<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index() {
        $transaction = transaction::orderBy('number_phone')->paginate(8);
        return view('report.index', compact('transaction'));
    }
    
    public function print()
    {
        $transaction = transaction::orderBy('number_phone')->get();
        return view('report.print', compact('transaction'));
    }
}
