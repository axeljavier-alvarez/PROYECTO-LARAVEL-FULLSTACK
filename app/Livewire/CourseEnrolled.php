<?php

namespace App\Livewire;

use Livewire\Component;
use CodersFree\Shoppingcart\Facades\Cart;

class CourseEnrolled extends Component
{
    public $course;

    public function render()
    {
        return view('livewire.course-enrolled');
    }

    /** Cursos GRATIS: inscribir directamente */
    public function enrolled()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Verificar si ya está inscrito
        if (!$this->course->students()->where('user_id', auth()->id())->exists()) {
            $this->course->students()->attach(auth()->id());
        }

        return redirect()->route('courses.status', $this->course->id);
    }

    /** Agregar al carrito */
    public function addCart()
    {
        Cart::instance('shopping')->add([
            'id' => $this->course->id,
            'name' => $this->course->title,
            'qty' => 1,
            'price' => $this->course->price->value,
            'options' => [
                'slug' => $this->course->slug,
                'image' => $this->course->image,
                'teacher' => $this->course->teacher->name,
            ],
        ]);

        //nuevo metodo para guardar el carrito en la base de datos
        if(auth()->check()){
        Cart::store(auth()->id());

        }

        $this->dispatch('cart-updated', Cart::count());
    }

    /** Eliminar del carrito */
    public function removeCart()
    {
        $item = Cart::instance('shopping')
            ->content()
            ->where('id', $this->course->id)
            ->first();

        if ($item) {
            Cart::remove($item->rowId);
        }


        // actualizar carrito en eliminar
        $this->dispatch('cart-updated', Cart::count());

        if(auth()->check()){
            Cart::store(auth()->id());

            }
    }

    /** Comprar ahora */
    public function buyNow()
    {
        $this->removeCart();
        $this->addCart();

        return redirect()->route('cart.index');
    }
}
