<x-layout.main title="Страны" h1="Все страны">
    <x-alert.simple-alert></x-alert.simple-alert>
    <div class="col-md-10 mb-5">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-primary mt-2" href="{{ route('countries.create') }}">Добавить страну</a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-dark mt-2" href="{{ route('brands.index') }}">Все бренды</a>
            </div>
        </div>
    </div>
    @if($countries->isNotEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">ISO</th>
                <th scope="col">Дата добавления</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                    <tr>
                        <th scope="row">{{ $country->id }}</th>
                        <td>
                            <div class="name">{{ $country->name }}</div>
                        </td>
                        <td>
                            <div class="iso">{{ $country->iso }}</div>
                        </td>
                        <td class="col-md-2">
                            <div class="created_at">{{ $country->created_at }}</div>
                        </td>
                        <td>
                            <div class="d-inline-flex">
                                <div class="ms-3">
                                    <x-btns.edit href="{{ route('countries.edit', $country->id) }}" />
                                </div>
                                <form method="post" action="{{ route('countries.destroy', $country->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <div class="ms-3">
                                        <x-btns.destroy />
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="col-md-3 mx-auto">
            <h3>Нет стран</h3>
        </div>
    @endif
</x-layout.main>
