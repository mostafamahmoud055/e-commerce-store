@props([
    'type' => 'text',
    'name',
    'value' => '',
    'label'
])
<label for="">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }} "
    {{ $attributes->class(['border-gray-300', 'rounded-lg', 'border-red-700' => $errors->has($name)]) }} />
@error($name)
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
