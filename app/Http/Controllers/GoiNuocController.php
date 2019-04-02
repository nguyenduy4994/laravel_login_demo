<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class GoiNuocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Product::all();
        return view('pages.goi_nuoc', ['list' => $list]);
        //dd($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataOrder = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone
        ];
        $order = Order::create($dataOrder);
        $totalPrice = 0;
        $totalQuantity = 0;
        foreach($request->product as $product)
        {
            if($product['quantity'] > 0){
                $productw = Product::find($product['id']);

                $dataProduct = [
                    'quantity' => $product['quantity'],
                    'price' => $productw->price
                ];
                $totalPrice += $productw->price;
                $totalQuantity += (int)$product['quantity'];

                $order->products()->attach($product['id'], $dataProduct);
            }
        }
        $order->total_quanlity = $totalQuantity;
        $order->total_price = $totalPrice;
        $order->save();
        return redirect()->route('danh-sach-don', ['id' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function orders($id)
    {
        $orders = Order::find($id);
        return view('pages.manage_order', ['orders' => $orders]);
    }
}
