@props([
    'name',
    'title',
    'options' => [],
])

@php
    $selected = (array) old($name, []);
@endphp

<div class="form-group">
    <div class="group-title">{{ $title }}</div>
    <div class="d-flex flex-wrap checkbox_wrapper">
        @foreach ($options as $value => $label)
            <label class="custom-checkbox">
                <input type="checkbox" name="{{ $name }}[]" value="{{ $value }}"
                       @checked(in_array($value, $selected))>
                <span class="checkmark"></span>
                {{ $label }}
            </label>
        @endforeach
    </div>
</div>
