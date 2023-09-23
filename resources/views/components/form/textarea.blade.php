@props([
    'name',
    'value' => '',
    'label',
])
<label class="mt-3" for="">
    {{$label}}
</label>
<textarea name="{{ $name }}"  cols="30" rows="10" 
    {{ $attributes->class([ 'border-red-700' => $errors->has($name)]) }}>{{ old($name, $value) }}
</textarea>
@error($name)
    <div class="text-red-700">
        {{ $message }}
    </div>
@enderror
