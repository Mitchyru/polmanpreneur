@extends('layouts.app', ['page' => __('product'), 'pageSlug' => 'product'])
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h4 class="card-title">Edit Your Product</h4>
            </div>
            <div class="col-4 text-right">
              <a href="{{url('/yourProduct',Auth::user()->user_id)}}" class="btn btn-sm btn-primary">Back</a>
          </div>
          </div>
          <div class="card-body">
            <div class="form-container sign-up-container">
              <form method="post" action="{{ route('user.updateProduct', $products->product_id) }}" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  @method('put')
                  @include('alerts.success')
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <label>{{ __('Name') }}</label>
                      <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ $products->name }}">
                      @include('alerts.feedback', ['field' => 'name'])
                  </div>
                  <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                    <label>{{ __('Price') }}</label>
                    <input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ $products->price }}">
                    @include('alerts.feedback', ['field' => 'price'])
                  </div>
                  <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                    <label>{{ __('Category') }}</label>
                    <select id="category" name="category">
                      @foreach ($data as $category)
                      <option value="{{ $category->category_id }}">{{ $category->category_id}} - {{ $category->category_name}}</option>
                      @endforeach
                  </select>
                    @include('alerts.feedback', ['field' => 'category'])
                  </div>
                  <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                    <label>{{ __('Description') }}</label>
                    <input type="text" name="desc" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ $products->desc }}">
                    @include('alerts.feedback', ['field' => 'desc'])
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputImage">Image:</label>
                    <br>
                    <label>{{ __('*Max size 2 MB , Format Image') }}</label>
                    <input 
                      accept="image/*"
                      type="file" 
                      name="image" 
                      id="inputImage"
                      class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                    <input type="hidden" name="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" placeholder="{{ __('ID') }}" value="{{ auth()->user()->user_id }}">
                    @include('alerts.feedback', ['field' => 'user_id'])
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-12" style="text-align: center">
                      <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                  </div>
                </div>
            </form>
          </div>
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
