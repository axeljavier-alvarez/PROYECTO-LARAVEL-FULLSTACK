<?php

namespace App\Livewire;

use Livewire\Component;
use CodersFree\Shoppingcart\Facades\Cart;

class ManageShoppingCart extends Component
{

    public function remove($rowId)
    {
        // dd($rowId);
        Cart::instance('shopping');
        Cart::remove($rowId);

        $this->dispatch('cart-updated', Cart::count());

    }

    public function render()
    {
        return view('livewire.manage-shopping-cart');
    }
}
