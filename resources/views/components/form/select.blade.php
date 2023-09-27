@props([
	'label',
	'name',
	'id',
	'options',
	'selectedValue' => null,
])

<div>
    <label>
        {{ $label }}
        <select class="form-select" name="{{ $name }}" id="{{ $id }}">
            <option value="" disabled {{ $selectedValue == null ? 'selected' : '' }}>Выберите значение</option>
            @foreach($options as $key => $value)
                <option value="{{ $key }}" {{ $selectedValue != null && $selectedValue == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </label>
    @error($name)
        <div class="error" style="color: red">{{ $message }}</div>
    @enderror
</div>
