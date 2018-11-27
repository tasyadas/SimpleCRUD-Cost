<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cost;
use Carbon\Carbon;
use App\Http\Controllers\CostController;
use Illuminate\Support\Facedes\Session;
use Auth;

class CostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //ambil semua data pada table costs
        $costs = Cost::all();

        // passing data $costs pada view costs
        return view('costs/index')->with([
            'costs' => $costs
        ]);
    }

    public function create()
    {
        return view('costs/create');
    }

    public function store(Request $request)
    {
        $now = Carbon::now('Asia/Jakarta');
        $time = '[' . $now->micro . ']';

        $filename = str_replace(array('/', '\\', ':', ' '), '', strtolower($request->name) . $time . '.png');
        $destinationPath = 'uploads/image/';

        $file = $request->image;
        $file->move(public_path($destinationPath), $filename);

        // dd(Auth::user()->id);

        if(Cost::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'value' => $request->value,
            'total' => $request->qty * $request->value,
            'image' => $destinationPath . '/' . $filename,
            'user_id' => Auth::user()->id
        ])){
            return redirect()->route('pengeluaran');
        }

        return redirect()->back();

    }



    // 3 fungsi diatas adalah fungsi yg dibuat baru
    // yg dibawah adalah yg lama


    public static function GetCost()
    {
        $costs = Cost::where('user_id', request()->session()->get('id'));

        if($costs){
            return $costs;
        }
        else{
            return redirect('/');
        }
    }

    public static function SumCost()
    {
        $sum = CostController::GetCost()->sum('total');
        // $sum = 0;
        // foreach ($costs as $key) {
        //     $sum = $sum + $key->total;
        // }
        // dd($sum);   

        return $sum;
    }

    public function CreateCost(Request $request)
    {
        $now = Carbon::now('Asia/Jakarta');
        $time = '[' . $now->micro . ']';

        $filename = str_replace(array('/', '\\', ':', ' '), '', strtolower($request->name) . $time . '.png');
        $destinationPath = 'uploads/image/';

        $file = $request->image;
        $file->move(public_path($destinationPath), $filename);

        $create = Cost::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'value' => $request->value,
            'total' => $request->qty * $request->value,
            'image' => $destinationPath . '/' . $filename,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);

        // return $create;
        return redirect('/pengeluaran');
    }

    public function DeleteCost($id)
    {
        $cost = Cost::find($id)->delete();
        return redirect('/pengeluaran');
    }

    public function UpdateCost(Request $request, $id)
    {
        $cost = Cost::find($id);
        $cost->name = $request->name;
        $cost->qty = $request->qty;
        $cost->value = $request->value;
        $cost->total = $request->qty * $request->value;
        $cost->updated_at = Carbon::now('Asia/Jakarta');

        if ($request->image != null) {
            $now = Carbon::now('Asia/Jakarta');
            $time = '[' . $now->micro . ']';

            $filename = str_replace(array('/', '\\', ':', ' '), '', strtolower($request->name) . $time . '.png');
            $destinationPath = 'uploads/image/';

            $file = $request->image;
            $file->move(public_path($destinationPath), $filename);

            $cost->image = $destinationPath . '/' . $filename;
        }

        $cost->save();

        return redirect('/pengeluaran');
    }
}
