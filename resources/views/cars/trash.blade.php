<x-layout.main title="Удаленные автомобили" h1="Удаленные автомобили">
    <x-alert.simple-alert></x-alert.simple-alert>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-primary mt-2 mb-2" href="{{ route('cars.index') }}">Все автомобили</a>
            </div>
        </div>
    </div>
    @if ($cars->isNotEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Бренд</th>
                <th scope="col">Модель</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Тип кузова</th>
                <th scope="col">Vin</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата удаления</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <th scope="row">{{ $car['id'] }}</th>
                    <td>
                        <div class="brand">{{ $car->brand->title }}</div>
                    </td>
                    <td>
                        <div class="model">{{ $car['model'] }}</div>
                    </td>
                    <td>
                        <div class="price">{{ $car['price'] }}</div>
                    </td>
                    <td>
                        <div class="body_type">{{ $bodyTypes[$car['body_type']] }}</div>
                    </td>
                    <td>
                        <div class="vin">{{ $car->vin }}</div>
                    </td>
                    <td>
                        <div class="created_at">{{ $car->created_at }}</div>
                    </td>
                    <td>
                        <div class="created_at">{{ $car->deleted_at }}</div>
                    </td>
                    <td>
                        <div class="d-inline-flex">
                            <form method="post" action="{{ route('cars.restore', $car->id) }}">
                                @method('PUT')
                                @csrf
                                <x-btns.restore />
                            </form>
                            <div class="ms-3">
                                <form method="post" action="{{ route('cars.delete', $car->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <x-btns.destroy />
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="col-md-2 mx-auto">
            <h3>Корзина пуста</h3>
        </div>
    @endif
</x-layout.main>
