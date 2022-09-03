<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function product()
    {
        $product = OrderDetail::select('product_id', DB::raw('SUM(qty) as total'))
            ->groupBy('product_id')
            ->orderBy('total', 'desc')
            ->paginate(10);
        return view('product', compact('product'));
    }


    public function detailProduct($id)
    {
        $product = Product::whereId($id)->first();
        return view('detail-product', compact('product'));
    }

    public function customer()
    {
        $orders = Order::select('customer_id', 'name', DB::raw('COUNT(invoice_id) as total'))
            ->groupBy('customer_id', 'name')
            ->orderBy('total', 'desc')
            ->paginate(10);
        return view('customers', compact('orders'));
    }

    public function agent()
    {
        $orders = Order::select('agent_id', 'agent_name', DB::raw('COUNT(customer_id) as total'))
            ->groupBy('agent_id', 'agent_name')
            ->orderBy('total', 'desc')
            ->paginate(10);
        return view('agent', compact('orders'));
    }
}
