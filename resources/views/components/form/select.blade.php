<label class="mt-3" for="">{{ $label }}</label>
<select name="{{ $name }}"
     @class([
        'border-2 ',
        'border-gray-300',
        'rounded-lg',
        'p-2',
        'border-red-400' => $errors->has($name),
    ])>
    @foreach ($options as $value => $text)
        <option value="{{ $value }}" @selected($value == $selected)>{{ $text }}</option>
    @endforeach
</select>
{{-- <x-form.validation-feedback :name="$name" /> --}}
