<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use Carbon\Carbon;
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

    public function order()
    {
        $orders = Order::orderBy('order_time', 'desc')->paginate(10);
        return view('orders', compact('orders'));
    }

    public function search(Request $request)
    {
        $search = $request->name;
        $orders = Order::where('name', 'like', "%" . $search . "%")
            ->paginate(10);
        return view('orders', compact('orders'));
    }

    public function filter()
    {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $orders = Order::whereBetween('order_time', [$start_date, $end_date])->paginate(10);
        return view('orders', compact('orders'));
    }

    public function orderDetail($id)
    {
        $order = Order::whereId($id)->first();
        return view('order-detail', compact('order'));
    }
}
