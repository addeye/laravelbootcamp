<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.transactions.index', [
            'transactions' => Transaction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.transactions.add',[
            "products" => Product::all(),
            "cart" => Cart::content()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $cart = Cart::content();
        $total = Cart::total();
        $pay = $request->pay;
        $change = Cart::total() - $request->pay;

        $trx_id = Transaction::create([
            "no_struck" => rand(1000, 9999),
            "total" => $total,
            "pay" => $pay,
            "discount" => 0,
            "change" => $change,
            "member" => "-"
        ]);

        foreach ($cart as $item) {
            TransactionDetail::create([
                "transaction_id" => $trx_id->id,
                "product_id" => $item->id,
                "price" => $item->price,
                "qty" => $item->qty,
                "total" => $item->price * $item->qty
            ]);
        }

        Cart::destroy();
        return redirect('/transactions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function cartInsert(Request $request){

        $product = Product::find($request->product_id);
        $qty = $request->qty;

        Cart::add($product->id, $product->name, $qty, $product->price);

        return redirect()->back();
    }

    public function cartDelete($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function cartDestroy(){
        Cart::destroy();
        return redirect()->back();
    }
}
