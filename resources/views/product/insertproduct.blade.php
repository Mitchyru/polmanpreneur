@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Product</h5>
                            <h2 class="card-title">Insert Product</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="form-container sign-up-container">
                            <form method="post" action="/crud" enctype="multipart/form-data">
                              @csrf
                              <div class="from-group">
                                <div class="form-outline mb-4">
                                  <label for="nim">NIM</label>
                                  <input type="text" class="form-control inline" name="nim" placeholder="NIM" value="{{ old('nim') }}">
                                </div>
                              </div>
                              <div class="from-group">
                                <div class="form-outline mb-4">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                                </div>
                              </div>
                              <div class="from-group">
                                <div class="form-outline mb-4">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                                </div>
                              </div>
                              <div class="from-group">
                                <div class="form-outline mb-4">
                                    <label for="desc">Description</label>
                                    <input type="text" class="form-control" name="desc" placeholder="Desc" value="{{ old('desc') }}">
                                </div>
                              </div>
                              <div class="from-group">
                                <div class="form-outline mb-4">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" name="status" placeholder="status" value="{{ old('status') }}">
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="inputImage">Image:</label>
                                <input 
                                    type="file" 
                                    name="image" 
                                    id="inputImage"
                                    class="form-control @error('image') is-invalid @enderror">
                  
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                              <button type="submit" class="btn mb-4">Add Product</button>
                            </form>
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
