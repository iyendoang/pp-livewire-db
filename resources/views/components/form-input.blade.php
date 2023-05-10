<!-- digunakan untuk membuat input teks pada form -->
@props(['type'=>'text', 'size' => 4, 'length'=>255, 'field', 'label'])
<div class="form-group row mb-2">
    <label for="{{$field}}" class="col-md-3">{{$label}}</label>
    <div class="col-md-{{$size}}">
        <input type="{{$type}}" class="form-control" length="{{$length}}" id="{{$field}}" name="{{$field}}" wire:model.lazy="{{$field}}">
        @error($field) <small class="text-danger">{{ $message }}</small> @enderror

        {{ $slot }}
    </div>
</div>