<div
    x-data="{ uploading: false, progress: 0 }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false"
    x-on:livewire-upload-cancel="uploading = false"
    x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <input type="file" accept="video/*" {{ $attributes->wire('model') }}>

    <div x-show="uploading" class="mt-4">
        <progress max="100" x-bind:value="progress" class="w-full"></progress>
        <p x-text="'Subiendo: ' + progress + '%'"></p>
    </div>
</div>
