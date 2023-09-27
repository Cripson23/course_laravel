<x-layout.main title="Register">
    <x-form action="{{ route('auth.register.store') }}">
        <div class="mb-3">
            <x-form-input name="name" label="Name" />
        </div>
        <div class="mb-3">
            <x-form-input name="email" label="Email" />
        </div>
        <div class="mb-3">
            <x-form-input name="password" type="password" label="Password" />
        </div>
        <div class="mb-3">
            <x-form-input name="password_confirmation" type="password" label="Confirm password" />
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Регистрация</button>
        </div>
    </x-form>

</x-layout.main>
