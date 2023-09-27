<div class="mb-3">
    <x-form-input name="title" label="Название"></x-form-input>
</div>
<div class="mb-3">
    <x-form-select name="country_id" label="Страна" :options="$countries" placeholder="Не выбрана"></x-form-select>
</div>
<div class="mb-3">
    <x-form-textarea name="description" label="Описание"></x-form-textarea>
</div>
