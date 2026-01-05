<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        // return $roles;

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        // devueelve los campos en json
        // return $request->all();

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'roles'=>'nullable|array'
        ]);

        $user = User::create($data);
        // return $data;

        if(isset($data['roles'])){
            $user->roles()->sync($data['roles']);
        }
        /* else {
            $user->roles()->detach();
        } */


        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        // return $user;
        // return $user->roles->pluck('id');
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // return $request->all();
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'roles' => 'nullable|array'
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if($data['password']){
            $user->password = bcrypt($data['password']);
        }




        $user->save();


         // nuevo codigo
        //  if(isset($data['roles'])){
        //     $user->roles()->sync($data['roles']);
        // }

        // Verifica si el formulario envió el campo roles.
        if(isset($data['roles'])){
            // verifica campo roles y asigna solo esos al user
            $user->roles()->sync($data['roles']);
        } else {
            // asigna solo roles seleccionados al user y elimina los que no van en array
            $user->roles()->detach();
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario actualizado',
            'text' => 'El usuario se ha actualizado correctamente'
        ]);

        return redirect()->route('admin.users.edit', $user);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // return "Eliminado";

        $user->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario eliminado',
            'text' => 'El usuario se ha eliminado correctamente'
        ]);

        return redirect()->route('admin.users.index');
    }
}
