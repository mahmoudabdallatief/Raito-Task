<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients =User::all();
        return view('clients',compact('clients'));
    }


    public function products(){
$products =Product::all();
return view('products',compact('products'));
    }



    public function invoice(){
        $invoices = [];
        foreach(Invoice::where('user_id', Auth::user()->id)->cursor() as $invoice) {
          $product = Product::findOrFail($invoice->pro_id);
          $total = $product->price * $invoice->quantity;
      
          DB::table('invoices')->where('id', $invoice->id)->update(['total' => $total]);
      
          $invoices[] = $invoice->fresh(); // Fetch updated invoice data
        }
        $sum =   Invoice::where('user_id', Auth::user()->id)->sum('total');
        return view('invoices', compact('invoices','sum'));
      }
      



    public function add_quantity(Request $request){


        $product = Product::findOrFail($request->pro_id);
$total = $product->price *$request->quantity;
        Invoice::create([
            'pro_id' => $request->pro_id,
            'user_id' => Auth::user()->id,
            'quantity' =>$request->quantity,
            'total' => $total,
        ]);
        return redirect()->route('invoice');
    }


}
