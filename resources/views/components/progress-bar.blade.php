@props(['width' => 100])

{{-- <div class="relative pt-1"> --}}
    <div {{ $attributes->merge(['class' => '' ]) }}>
       <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">

       <div style="width:{{ $width }}%"
       class="shadow-none flex flex-col text-center
       whitespace-nowrap text-white justify-center bg-gray-500">

       </div>

    </div>

</div>