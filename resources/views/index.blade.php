@extends("layout.header")

@section('container')
    <div class="container">
        <div class="d-flex flex-row mt-3">
            <div class="col-8">
                <div class="row">
                    @foreach ($articles->take(2) as $art)
                    <div class="card col-6 p-2" style="width: 18rem;">
                        <img src="ft/{{ $art->img }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $art->judul }}</h5>
                            <p class="card-text">{{ $art->isi }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-4 p-4">
                <ul class="list-group list-group-flush">
                    @foreach ($articles as $art)
                        <li class="list-group-item">{{ $art->judul }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
