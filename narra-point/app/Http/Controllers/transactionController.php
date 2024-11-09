<?php

namespace App\Http\Controllers;

use App\Models\dataMaster;
use App\Models\transaction;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    protected $transaction;
    public function __construct()
    {
        $this->transaction = new transaction();
    }

    public function index() 
    {
        $transaction = $this->transaction->paginate(8);
        $datamaster = dataMaster::pluck('customer_name', 'number_phone');
        // $datamaster = dataMaster::all();
        return view('transaction.index', compact('transaction', 'datamaster'));
    }

    public function create()
    {
        $datamaster = dataMaster::pluck('customer_name', 'number_phone');
        return view('transaction.create', compact('datamaster'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'date' => 'required|date',
            'number_phone' => 'required|string',
            'option' => 'required|in:1,2',
            'add' => 'required|numeric|min:0'
        ]);

        $date = $request->input('date');
        $number_phone = $request->input('number_phone');
        $customer_name = $request->input('customer_name');
        $option = $request->input('option');
        $add = $request->input('add');


        $total_point = 0;
        // Cek apakah data dengan number_phone yang sama sudah ada dalam basis data
        $existingTransaction = transaction::where('number_phone', $number_phone)->first();
    
            if ($existingTransaction) {
                // Data sudah ada, perbarui total_point
                $currentTotalPoint = $existingTransaction->total_point;

                // Hitung total point baru sesuai dengan opsi yang dipilih
                if ($option == '1') {
                    $newTotalPoint = $currentTotalPoint + ($add / 100);
                } else if ($option == '2') {
                    // Cek jika poin tidak cukup
                    if ($currentTotalPoint < $add) {
                        return redirect()->back()->with('error', 'Sorry, The Point Is Not Enough To Exchange');
                    }
                    $newTotalPoint = $currentTotalPoint - $add;

                    // $newTotalPoint = $currentTotalPoint - $add;
                    // // Pastikan total point tidak negatif
                    // $newTotalPoint = max($newTotalPoint, 0);
                }
                // Perbarui data yang ada dengan total_point yang baru
                $existingTransaction->update(['total_point' => $newTotalPoint]);
                dataMaster::where('number_phone', $number_phone)->update(['point' => $newTotalPoint]);
            } else {
                // Data belum ada, buat data baru
                $total_point = ($option == '1') ? $add / 100 : 0 - $add;
        
                // Create an array of data to be saved
                $data = [
                    'date' => $date,
                    'number_phone' => $number_phone,
                    'customer_name' => $customer_name,
                    'option' => $option,
                    'add' => $add,
                    'total_point' => $total_point,
                ];
                transaction::create($data);
                // Create the transaction record
                // transaction::create($data);
                dataMaster::where('number_phone', $number_phone)->update(['point' => $total_point]);
            }
            return redirect()->to('transaction')->with('success', 'Added Successfully');  
    }

    public function getCustomerName(Request $request)
    {
        $number_phone = $request->number_phone;
        $customer = dataMaster::where('number_phone', $number_phone)->first();

        if($customer) {
            return response()->json(['customer_name'=>$customer->customer_name]);
        } else {
            return response()->json(['customer_name'=>'']);
        }
    }


}
