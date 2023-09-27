<div class="mb-3">
    <x-form-select name="brand_id" label="Бренд" :options="$brands" placeholder="Не выбран"></x-form-select>
</div>
<div class="mb-3">
    <x-form-input name="model" label="Модель"></x-form-input>
</div>
<div class="mb-3">
    <x-form-input name="price" type="number" label="Стоимость"></x-form-input>
</div>
<div class="mb-3">
    <x-form-select name="body_type" label="Тип кузова" :options="$bodyTypes" placeholder="Не выбран"></x-form-select>
</div>
<div class="mb-3">
    <x-form-select name="tags[]" label="Тэги" :options="$tags" multiple many-relation ></x-form-select>
    @error('tags.*')
    <div style="
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: #dc3545;
    ">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <x-form-input name="vin" type="text" label="Vin"></x-form-input>
</div>
