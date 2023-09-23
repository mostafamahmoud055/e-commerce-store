@props(['type', 'name', 'label'])
<label for="">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}"
    {{ $attributes->class(['border-2', 'border-gray-300', 'rounded-lg']) }} />
@error($name)
    <div class="text-red-700">
        {{ $message }}
    </div>
@enderror
