@extends('layouts.app', ['page' => __('category'), 'pageSlug' => 'category'])
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h4 class="card-title">Insert Category</h4>
            </div>
            <div class="col-4 text-right">
              <a href="/dashboard" class="btn btn-sm btn-primary">Back</a>
          </div>
          </div>
          <div class="card-body">
            <div class="form-container sign-up-container">
              <form method="post" action="/addCategory" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  @method('post')
                  @include('alerts.success')
                  <div class="from-group">
                    <div class="form-outline mb-4">
                      <label for="category_name">Category</label>
                      <input type="text" class="form-control" name="category_name" placeholder="Category" value="{{ old('category_name') }}">
                    </div>
                  </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-12" style="text-align: center">
                      <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
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
