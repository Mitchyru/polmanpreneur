@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Product</h5>
                            <h2 class="card-title">List Product</h2>
                            <div>
                                <a type="button" class="btn btn-primary btn-lg" href="/crud" name="tambah">Tambah</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-container sign-up-container">
                        @foreach ($data as $item)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#" class="image">
                                            <img class="img-{{ $item->product_id }}" src="{{ asset('images/'.$item->image) }}">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="price">{{ $item->price }}</div>
                                        <h3 class="title"><a href="#">{{ $item->name }}</a></h3>
                                    </div>
                                    <form action="/crud/{{ $item->product_id }}" method="POST">
                                        @method('GET')
                                        <a class="btn btn-primary" href="/crud/{{ $item->product_id }}/edit">Edit</a>
                                    </form>
                                    <form action="{{ route('crud.destroy', $item->product_id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger ms-auto">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
