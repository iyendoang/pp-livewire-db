<!-- digunakan untuk membuat input dengan datepicke -->
@props(['size' => 3, 'field', 'label'])
<div class="form-group row mb-2" x-data x-init="
    new Pikaday({ 
        field: $refs.input,  
        toString(date, format) {
            const day = '0' + date.getDate();
            const month = '0' + (date.getMonth() + 1);
            const year = date.getFullYear();
            return `${year}-${month.substr(-2)}-${day.substr(-2)}`;
        },
    })
">
    <label for="{{$field}}" class="col-md-3">{{$label}}</label>
    <div class="col-md-{{$size}}">
        <input type="text" x-ref="input" class="form-control" id="{{$field}}" name="{{$field}}" wire:model.lazy="{{$field}}" autocomplete="off">
        @error($field) <small class="text-danger">{{ $message }}</small> @enderror

        {{ $slot }}
    </div>
</div>