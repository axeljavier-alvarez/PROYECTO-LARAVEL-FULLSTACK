<?php

namespace App\Livewire;

use CodersFree\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CourseEnrolled extends Component
{

    public $course;

    // usuario tiene que estar autenticado
    public function enrolled()
{
    if(auth()->check()){
        $this->course->students()->attach(auth()->id());

        // Agregar al carrito automáticamente
        Cart::instance('shopping')->add([
            'id' => $this->course->id,
            'name' => $this->course->title,
            'qty'=> 1,
            'price'=> $this->course->price->value,
            'options'=>[
                'slug' => $this->course->slug,
                'image'=>$this->course->image,
                'teacher'=>$this->course->teacher->name
            ]
        ]);

        $this->dispatch('cart-updated', Cart::count());
    }

    return redirect()->route('courses.status', ['course' => $this->course->id]);
}


    public function render()
    {
        return view('livewire.course-enrolled');
    }



    public function addCart()
    {
        Cart::instance('shopping');
        Cart::add([
            'id' => $this->course->id,
            'name' => $this->course->title,
            'qty'=> 1,
            'price'=> $this->course->price->value,
            'options'=>[
                'slug' => $this->course->slug,
                'image'=>$this->course->image,
                'teacher'=>$this->course->teacher->name
            ]
        ]);

        $this->dispatch('cart-updated', Cart::count());
    }

    public function removeCart()
    {

        Cart::instance('shopping');


        $itemCart = Cart::content('shopping')->where('id', $this->course->id)->first();

        if($itemCart){
            Cart::remove($itemCart->rowId);

        }

        $this->dispatch('cart-updated', Cart::count());

        // Cart::remove($this->course->id);

    }



    public function buyNow()
    {
        $this->removeCart();
        $this->addCart();

        return redirect()->route('cart.index');

    }

}
