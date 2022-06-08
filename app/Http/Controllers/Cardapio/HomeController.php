<?php

namespace App\Http\Controllers\Cardapio;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use App\Models\Category;
use App\Models\TypePayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CheckoutRequest;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')
        ->has('products')
        ->IsActive()
        ->get();
        
        return view('cardapio.index', ['categories' => $categories]);
    }

    public function cart()
    {
        $typePayments = TypePayment::where('status', 'active')->get();
        
        $products = collect();

        if (session()->has('cart')) {
            $products = session()->get('cart');
        }
    
        return view('cardapio.cart', [
            'products' => $products, 
            'typePayments' => $typePayments
        ]);
    }

    public function addCart(Product $product)
    {
        if (session()->has('cart')) {
            $products = collect(session()->get('cart'));
            if ($products->where('id', $product->id)->count()) {
                $products = $products->map(function($item) use ($product){
                    if ($item['id'] == $product->id) {
                        $item['quantity'] += 1;
                        $item['total'] = $product->price * $item['quantity'];
                    }
                    return $item;
                });
            }else{
                $products->push([
                    'id'        => $product->id,
                    'product'   => $product,
                    'total'     => $product->price,
                    'quantity'  => 1
                ]);
            }

            $this->getItemsCarNotification($products);

            session()->put('cart', $products);
            
            
            return redirect()->route('menu.cart');
        }
        
        session()->put('cart',collect()->push([
            'id'       => $product->id,
            'product'  => $product,
            'total'    => $product->price,
            'quantity' => 1
        ]));
        
        
        return redirect()->route('menu.cart');
    }

    public function removeCart($index)
    {
        $products = session()->get('cart');

        $products->splice($index, 1);

        session()->put('cart', $products);

        $this->getItemsCarNotification($products);
        

        return back();
    }

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->validated();
        
        $products = $this->prepareProductsRelation();

        $client = Client::create($data);

        $client->address()->create($data);

        $data['client_id'] = $client->id;

        $order = Order::create($data);

        $order->products()->attach($products);

        
        $url ="https://wa.me/5511984477234";
        $pedido = $order->products->pluck('name')->join(', ',' e ');

        $text = "Um pedido feito com sucesso!";
                
        $text .="Nome: {$client->name},";
        $text .="Endereço: {$client->address->place}";      
        $text .="Pedido: {$pedido}";
        $text .="Total:  {$order->total}";
        
        session()->forget('cart');

        return redirect()->to($url.'?text='.urlencode($text));
    }

    public function getItemsCarNotification($products)
    {   
        session()->put('itemsCar', array_sum(array_column($products->toArray(),'quantity')));
    }

    protected function prepareProductsRelation()
    {
        if (session()->has('cart')) {
            $products = session()->get('cart');
            return $products->keyBy(function($product){
                return $product['product']->id;
            })->map(function($product){
                return [
                    'quantity' => $product['quantity']
                ];
            });
        }

        return [];
    }
}