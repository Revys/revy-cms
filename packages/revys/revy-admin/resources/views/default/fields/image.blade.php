<div class="form__group">
    <label class="form__group__label" for="form-input-{{ $field['field'] }}">{{ $field['label'] }}</label>
    <div class="form__group__input-group">
        {{ Form::file(
            $field['field'],
            [
                'id' => 'form-input-' . $field['field'],
                'class' => 'form__group__input ' .
                           'form__group__image ' .
                           ($errors->any($field['field']) ? 'form__group__input--error form__group__image--error' : '')
            ]
        ) }}

        @includeDefault('fields._errors')

        @push('js')
            <script>
                $("#form-input-{{ $field['field'] }}").dropify({
                    defaultFile: '{{ (isset($object) ? (! is_string($field['value']) ? $field['value']($object) : $object->{$field['value']}) : '') }}',
                    imgFileExtensions: ['png', 'jpg', 'jpeg', 'gif', 'svg'],
                    maxFileSizePreview: "5M",
                    allowedFileExtensions: ['png', 'jpg', 'jpeg', 'gif', 'svg'],
                    messages: {
                        'default': '@lang('Перетащите файл или нажмите')',
                        'replace': '@lang('Перетащите файл или нажмите')',
                        'remove':  '@lang('Удалить')',
                        'error':   '@lang('Произошла ошибка')'
                    },
                    error: {
                        'fileSize': '@lang('Размер файла слишком велик') (@{{ value }} @lang('максимум').',
                        'minWidth': '@lang('Ширина изображения слишком маленькая') (@{{ value }}}px @lang('минимум')).',
                        'maxWidth': '@lang('Ширина изображения слишком большая') (@{{ value }}}px @lang('максимум')).',
                        'minHeight': '@lang('Высота изображения слишком маленькая') (@{{ value }}}px @lang('минимум')).',
                        'maxHeight': '@lang('Высота изображения сликом большая') (@{{ value }}px @lang('максимум')).',
                        'imageFormat': '@lang('Изображение имеет недопустимый формат') (@lang('только') @{{ value }})).',
                        'fileExtension': '@lang('Файл имеет недопустимый формат') (@lang('только') @{{ value }})).',
                    }
                });
            </script>
        @endpush
    </div>
</div>