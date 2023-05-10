<!-- digunakan untuk membuat textarea pada form -->
@props(['size' => 9, 'field', 'label'])
<div class="form-group row mb-2">
    <label for="{{$field}}" class="col-md-3">{{$label}}</label>
    <div class="col-md-{{$size}}">
        <textarea class="form-control" id="{{$field}}" name="{{$field}}" wire:model="{{$field}}"></textarea>
        @error($field) <small class="text-danger">{{ $message }}</small> @enderror

        {{$slot}}
    </div>
</div>