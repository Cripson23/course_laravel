<x-layout.main title="Enter to site">
    <x-form action="{{ route('auth.sessions.store') }}">
        <div class="mb-3">
            <x-form-input name="email" label="Email" />
        </div>
        <div class="mb-3">
            <x-form-input name="password" type="password" label="Пароль" />
        </div>
        <div class="mb-3">
            <x-form-checkbox name="remember" label="Запомнить" />
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Войти</button>
        </div>
    </x-form>

</x-layout.main>
