<x-layout.main title="Тэги" h1="Все тэги">
    <x-alert.simple-alert></x-alert.simple-alert>
    <div class="col-md-10 mb-5">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-primary mt-2" href="{{ route('tags.create') }}">Добавить тэг</a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-dark mt-2" href="{{ route('cars.index') }}">Все автомобили</a>
            </div>
        </div>
    </div>
    @if($tags->isNotEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Ссылка</th>
                <th scope="col">Дата добавления</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td>
                            <div class="name">{{ $tag->name }}</div>
                        </td>
                        <td>
                            <div class="name">{{ $tag->url }}</div>
                        </td>
                        <td class="col-md-2">
                            <div class="created_at">{{ $tag->created_at }}</div>
                        </td>
                        <td>
                            <div class="d-inline-flex">
                                <div class="ms-3">
                                    <x-btns.edit href="{{ route('tags.edit', $tag->id) }}" />
                                </div>
                                <form method="post" action="{{ route('tags.destroy', $tag->id) }}">
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
            <h3>Нет тэгов</h3>
        </div>
    @endif
</x-layout.main>
