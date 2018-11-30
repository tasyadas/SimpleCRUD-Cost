<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cost;
use Carbon\Carbon;
use App\Http\Controllers\CostController;
use Illuminate\Support\Facedes\Session;

class CostController extends Controller
{
    public static function GetCost(Request $request)
    {
        dd($request);
        $loginauth = $request->session()->get('data');
        
        if ($loginauth != null) {
            $costs = Cost::where('user_id', $loginauth->id)->get();
            return $costs;

        }else{
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
