<div class="form-group min-vh-100">
    <form wire:submit.prevent="store">

        @include('livewire.instructor.posts.header_medium')

        <div style="width: 80%; margin: auto">
            <input wire:model.defer="newPost.title" type="text" class="mb-4 w-100 h1 me-h1-medium"
                   placeholder="عنوان را اینجا بنویسید">
            <textarea class="editable form__description">{!! $newPost['body'] ?? '' !!}</textarea>
        </div>
    </form>

</div>



@push('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css"
          type="text/css" media="screen" charset="utf-8">

    <style>

        .medium-editor-element {
            direction: rtl;
        }


        .medium-editor-element:focus-visible {
            border: 0;
            outline: 0;
        }

        .me-h1-medium, .me-h1-medium:focus-visible {
            border: 0;
            outline: 0;
        }
    </style>
@endpush

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>

    <script>


        var editor = new MediumEditor('.editable');
        editor.subscribe('blur', function (event, editable) {
        @this.set('newPost.body', editor.getContent());
        });


    </script>
@endpush
