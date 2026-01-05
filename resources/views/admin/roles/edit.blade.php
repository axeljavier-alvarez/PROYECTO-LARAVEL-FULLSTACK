<x-admin-layout :breadcrumb="[
   [
       'name' => 'Dashboard',
       'url' =>  route('admin.dashboard'),
   ],
   [
      'name' => 'Roles',
      'url' => route('admin.roles.index')
    ],
    [
        'name' => 'Editar'
    ]
]">

    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
        @csrf
        @method('PUT')



        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>

                <x-input name="name" value="{{ old('name', $role->name) }}" class="w-full"/>
            </div>



            <!-- codigo de users -->

            <div class="mb-4">
                <x-label class="mb-1">
                    Permisos
                </x-label>

                <ul>
                    @foreach ( $permissions as $permission )
                    <li>
                        <label>
                            <x-checkbox name="permissions[]" value="{{ $permission->id }}" :checked="in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()))"
                            />
                            {{ $permission->name }}

                        </label>
                    </li>
                    @endforeach
                </ul>

            </div>

            <div class="flex justify-end">
                <x-button>
                    Actualizar
                </x-button>
            </div>
        </div>
    </form>



</x-admin-layout>
