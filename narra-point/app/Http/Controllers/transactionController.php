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

        // ambil data pelanggan berdasarkan number_phone
        $customer = dataMaster::where('number_phone', $number_phone)->first();
    
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
                // $customer->update(['point' => $newTotalPoint]);
                dataMaster::where('number_phone', $number_phone)->update(['point' => $newTotalPoint]);

                $total_point = $newTotalPoint;
            } else {
                // Data belum ada, buat data baru
                $total_point = ($option == '1') ? $add / 100 : 0 - $add;
        
                // buat data transaksi baru
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

            //cek apakah membership level sudah ada, jika sudah ada jangan diubah
            if ($customer->membership_level =="Gold" ) {
                //jangan ubah level membership
                return redirect()->to('transaction')->with('success', 'Transaction Successfully');
            } else if ($customer->membership_level =="Silver") {
                if ($total_point < 10000){
                    return redirect()->to('transaction')->with('success', 'Transaction Successfully');
                } else {
                    dataMaster::where('number_phone', $number_phone)->update([
                    'membership_level'=> $customer->getMembershipLevel($total_point)]);
                }
            
            }else {
                dataMaster::where('number_phone', $number_phone)->update([
                'membership_level'=> $customer->getMembershipLevel($total_point)
            ]);
            }


            return redirect()->to('transaction')->with('success', 'Added Successfully');  
    }

//     public function store(Request $request)
// {
//     // Validasi input
//     $request->validate([
//         'date' => 'required|date',
//         'number_phone' => 'required|string',
//         'option' => 'required|in:1,2',
//         'add' => 'required|numeric|min:0'
//     ]);

//     $date = $request->input('date');
//     $number_phone = $request->input('number_phone');
//     $option = $request->input('option');
//     $add = $request->input('add');

//     // Ambil data pelanggan
//     $customer = dataMaster::where('number_phone', $number_phone)->first();

//     if (!$customer) {
//         return redirect()->back()->with('error', 'Customer not found.');
//     }

//     // Simpan poin lama untuk perbandingan
//     $currentTotalPoint = $customer->point;
//     $newTotalPoint = $currentTotalPoint;

//     // Logika penambahan dan pengurangan poin
//     if ($option == '1') {
//         // Tambah poin (misalnya, 1 poin untuk setiap 100 add)
//         $newTotalPoint += ($add / 100);
//     } elseif ($option == '2') {
//         // Tukar poin
//         if ($currentTotalPoint < $add) {
//             return redirect()->back()->with('error', 'Sorry, The Point Is Not Enough To Exchange');
//         }
//         // Kurangi poin
//         $newTotalPoint -= $add;
//     }

//     // Update poin baru pada transaksi yang ada atau buat transaksi baru
//     transaction::updateOrCreate(
//         ['number_phone' => $number_phone],
//         [
//             'date' => $date,
//             'number_phone' => $number_phone,
//             'customer_name' => $customer->customer_name,
//             'option' => $option,
//             'add' => $add,
//             'total_point' => $newTotalPoint
//         ]
//     );

//     // **Update poin di dataMaster tanpa mengubah membership level**
//     $existingLevel = $customer->membership_level;

//     // Update poin saja
//     $customer->update([
//         'point' => $newTotalPoint
//     ]);

//     // Hanya update membership level jika ada **penambahan poin**
//     if ($option == '1') {
//         $customer->update([
//             'membership_level' => $this->getMembershipLevel($newTotalPoint)
//         ]);
//     }

//     return redirect()->to('transaction')->with('success', 'Transaction Completed Successfully');
// }

/**
 * Fungsi untuk menentukan level membership berdasarkan poin.
 */
public function getMembershipLevel($point)
{
    if ($point >= 5000) {
        return 'Gold';
    } elseif ($point >= 1000) {
        return 'Silver';
    } else {
        return 'Classic';
    }
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
