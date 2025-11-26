<div class="w-full max-w-full overflow-hidden">
    <div
        wire:ignore
        x-data="{ content: @entangle($attributes->wire('model')) }"
        x-init="
            ClassicEditor
                .create($refs.editor, {
                    removePlugins: ['SimpleUploadAdapter']
                })
                .then(editor => {
                    if(content){
                        editor.setData(content);
                    }
                    editor.model.document.on('change:data', () => {
                        content = editor.getData();
                    });
                })
                .catch(error => console.error(error));
        "
    >
        <x-textarea x-ref="editor" wire:model="description" class="w-full" />
    </div>
</div>
