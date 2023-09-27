<x-layout.main title="Бренды" h1="Все бренды">
    <x-alert.simple-alert></x-alert.simple-alert>
    <div class="col-md-10 mb-5">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-primary mt-2" href="{{ route('brands.create') }}">Добавить бренд</a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-dark mt-2" href="{{ route('cars.index') }}">Все автомобили</a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-warning mt-2" href="{{ route('countries.index') }}">Все страны</a>
            </div>
        </div>
    </div>
    @if($brands->isNotEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Страна</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата добавления</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{ $brand->id }}</th>
                        <td>
                            <div class="title">{{ $brand->title }}</div>
                        </td>
                        <td>
                            <div class="country">{{ $brand->country->name ?? null }}</div>
                        </td>
                        <td>
                            <div class="description">{{ $brand->description }}</div>
                        </td>
                        <td class="col-md-2">
                            <div class="created_at">{{ $brand->created_at }}</div>
                        </td>
                        <td>
                            <div class="d-inline-flex">
                                <x-btns.show href="{{ route('brands.show', $brand->id) }}" />
                                <div class="ms-3">
                                    <x-btns.edit href="{{ route('brands.edit', $brand->id) }}" />
                                </div>
                                <form method="post" action="{{ route('brands.destroy', $brand->id) }}">
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
            <h3>Нет брендов</h3>
        </div>
    @endif
</x-layout.main>
