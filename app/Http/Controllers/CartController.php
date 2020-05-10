<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index() {
        dd(session()->get('cart'));
    }

    public function add(Request $request){
        $product = $request->get('product');

        //verificar se existe sessao para os produtos
        if(session()->has('cart')) {

            //existindo eu adiciono o produto a seção existente
            session()->push('cart', $product);

        } else {

             //nao existindo a sessao eu crio com o primeiro produto
            $products[] = $product;

            session()->put('cart', $products);

        }

            flash('Produto adicionado no carrinho')->success();
            return redirect()->route('product.single', ['slug' => $product['slug']]);
    }
}
