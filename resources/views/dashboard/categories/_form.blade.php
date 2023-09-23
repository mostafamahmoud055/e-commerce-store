<x-form.input name="name" :value="$category->name" label="Category Name" />
<label class="mt-3" for="">Category Parent</label>
<select class="border-gray-300 rounded-lg" name="parent_id">
    <option value="">Primary Category</option>
    @foreach ($parents as $parent)
        <option value="{{ $parent->id }}" @selected( old('parent_id',$category->parent_id) == $parent->id)>{{ $parent->name }}</option>
    @endforeach
</select>

@error('parent_id')
    <div class="text-red-700">
        {{ $message }}
    </div>
@enderror

<x-form.textarea name="Description" class="border-gray-300 rounded-lg" label="Description"/>
<x-form.file type="file" name="image" label="Image"/>
@if ($category->image)
    <img src="{{ asset('storage/' . $category->image) }}" alt="" width="100">
@endif
<x-form.radio name="status" :checked="$category->status" label="Status" :options="['Active'=>'active','Archived'=>'archived']" />
<button type="submit"
    class="bg-blue-500 focus:bg-blue-600 border-2 border-gray-500 rounded-lg p-1 my-3 w-fit">{{ $button_label ?? 'Save' }}</button>
