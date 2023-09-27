<x-layout.main title="Главная страница" h1="Все автомобили">
    <x-alert.simple-alert></x-alert.simple-alert>
    <div class="col-md-12 mb-5">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-success mt-2" href="{{ route('cars.create') }}">Добавить автомобиль</a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-dark mt-2" href="{{ route('brands.index') }}">Бренды автомобилей</a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-danger mt-2" href="{{ route('tags.index') }}">Тэги</a>
            </div>
            <div class="col-md-1 offset-5">
                <a class="btn btn-warning mt-2" href="{{ route('cars.trashed') }}">
                    <i class="bi bi-trash3"></i>
                </a>
            </div>
        </div>
    </div>
    @if($cars->isNotEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Бренд</th>
                <th scope="col">Модель</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Тип кузова</th>
                <th scope="col">Vin</th>
                <th scope="col">Страна производства</th>
                <th scope="col">Тэги</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr>
                        <th scope="row">{{ $car->id }}</th>
                        <td>
                            <div class="brand">{{ $car->brand->title }}</div>
                        </td>
                        <td>
                            <div class="model">{{ $car->model }}</div>
                        </td>
                        <td>
                            <div class="price">{{ $car->price }}</div>
                        </td>
                        <td>
                            <div class="body_type">{{ $bodyTypes[$car->body_type] }}</div>
                        </td>
                        <td>
                            <div class="vin">{{ $car->vin }}</div>
                        </td>
                        <td>
                            <div class="country">{{ $car->brand->country->name }}</div>
                        </td>
                        <td>
                            <div class="tags">
                                @foreach($car->tags as $tag)
                                    <p>{{ $tag->name }}</p>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <div class="created_at">{{ $car->created_at }}</div>
                        </td>
                        <td>
                            <div class="status">{{ $car->status->text()  }}</div>
                        </td>
                        <td>
                            <div class="d-inline-flex">
                                <x-btns.show href="{{ route('cars.show', $car->id) }}" />
                                <div class="ms-3">
                                    <x-btns.edit href="{{ route('cars.edit', $car->id) }}" />
                                </div>
                                <form method="post" action="{{ route('cars.destroy', $car->id) }}">
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
            <h3>Нет автомобилей</h3>
        </div>
    @endif
</x-layout.main>
