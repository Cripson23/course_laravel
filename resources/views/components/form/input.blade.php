@props([
	'label',
	'name',
	'type',
	'defaultValue' => ''
])

<div>
    <label>
        {{ $label }}&nbsp;
        <input class="form-control" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $defaultValue) }}">
    </label>
    @error($name)
        <div class="error" style="color: red">{{ $message }}</div>
    @enderror
</div>
