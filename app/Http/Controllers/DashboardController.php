<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::count();
        $customers = Client::count();
        
        return view('dashboard',[
            'orders' => $orders,
            'customers' => $customers
        ]);
    }
}
