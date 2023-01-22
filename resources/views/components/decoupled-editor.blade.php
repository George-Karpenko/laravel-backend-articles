@props(['uploadUrl'])

<div wire:ignore class="w-full overflow-hidden">

    <div x-data="{ value: @entangle($attributes->wire('model')) }" x-init="$refs.editor.innerHTML = value;
    DecoupledEditor.create($refs.editor, {
            ckfinder: {
                uploadUrl: '{{ $uploadUrl . '?_token=' . csrf_token() }}'
            },
            imageRemoveEvent: {
                additionalElementTypes: null, // Add additional element types to invoke callback events. Default is null and it's not required. Already included ['image','imageBlock','inlineImage']
                // additionalElementTypes: ['image', 'imageBlock', 'inlineImage'], // Demo to write additional element types
                callback: (imagesSrc, nodeObjects) => {
                    // note: imagesSrc is array of src & nodeObjects is array of nodeObject
                    // node object api: https://ckeditor.com/docs/ckeditor5/latest/api/module_engine_model_node-Node.html
    
                    console.log('callback called', imagesSrc, nodeObjects)
                }
            },
        })
        .then(function(editor) {
            $refs.toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            editor.model.document.on('change:data', () => {
                $dispatch('input', editor.getData())
            })
        })
        .catch(error => {
            console.error(error);
        });" x-model="value">
        <div x-ref="toolbarContainer"></div>
        <div class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm border w-full"
            x-ref="editor"></div>
    </div>
</div>
