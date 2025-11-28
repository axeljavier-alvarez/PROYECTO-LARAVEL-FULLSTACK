<?php

namespace App\Livewire;

use Livewire\Component;
use CodersFree\Shoppingcart\Facades\Cart;

class ManageShoppingCart extends Component
{


    public function destroy()
    {
        Cart::instance('shopping');
        Cart::destroy();


        // de la api de codersree para vaciar carrito
         $this->dispatch('cart-updated', Cart::count());

            if(auth()->check()){
                Cart::store(auth()->id());

                }


        // $this->dispatch('cart-updated', Cart::count());
    }
    public function remove($rowId)
    {
        // dd($rowId);
        Cart::instance('shopping');
        Cart::remove($rowId);

        // de la api de codersfreee para actualizar el carrito
        $this->dispatch('cart-updated', Cart::count());

            if(auth()->check()){
                Cart::store(auth()->id());

                }

    }

    public function render()
    {
        return view('livewire.manage-shopping-cart');
    }
}
