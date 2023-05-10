<!-- digunakan untuk membuat input select box pada form -->
@props(['size' => 4, 'field', 'label'])
<div class="form-group row mb-2">
    <label for="{{$field}}" class="col-md-3">{{$label}}</label>
    <div class="col-md-{{$size}}">
        <select class="form-select" id="{{$field}}" name="{{$field}}" wire:model="{{$field}}">

        {{ $slot }}
        
        </select>
        @error($field) <small class="text-danger">{{ $message }}</small> @enderror
    </div>
</div>