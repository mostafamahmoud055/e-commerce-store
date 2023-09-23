@props(['name','options','label','checked'])
<label class="mt-3" for="">{{ $label }}</label>
<div @class([
    'border-2 ',
    'border-gray-300',
    'rounded-lg',
    'p-2',
    'border-red-400' => $errors->has($name),
])>
    @foreach ($options as $value => $text)
        <label for="{{ $value }}">{{ $value }}</label>
        <input class="me-3" type="radio" name={{ $name }} value="{{ $text  }}" id="{{ $value }}"
            @checked(old($name, $checked) == $text)>
    @endforeach
</div>
@error($name)
    <div class="text-red-700">
        {{ $message }}
    </div>
@enderror