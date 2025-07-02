@extends('layouts.app', ['page' => __('letter'), 'pageSlug' => 'letter'])
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h4 class="card-title">Insert Seller Approval Form</h4>
            </div>
            <div class="col-4 text-right">
              <a href="/dashboard" class="btn btn-sm btn-primary">Back</a>
          </div>
          </div>
          <a href="{{ asset('docs/form_pengajuan.docx') }}" class="btn btn-success" download>
              <i class="tim-icons icon-cloud-download-93"></i> Unduh Formulir DOCX
          </a>
          <div class="card-body">
            <div class="form-container sign-up-container">
              <form method="post" action="/formStore" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  @method('post')
                  @include('alerts.success')
                  <div class="from-group">
                    <div class="form-outline mb-4" style="display: none;">
                        <select name="user_id" id="user_id">
                            <option value="{{ Auth::user()->user_id }}" type="hidden">{{ Auth::user()->user_id }}</option>
                        </select>  
                    </div>
                  </div>
                  <div class="from-group">
                    <div class="form-outline mb-4" style="display: none;">
                        <select name="nim" id="nim">
                            <option value="{{ Auth::user()->nim }}" type="hidden">{{ Auth::user()->nim }}</option>
                        </select>  
                    </div>
                  </div>
                  <div class="from-group">
                    <div class="form-outline mb-4" style="display: none;">
                        <select name="name" id="name">
                                    <option value="{{ Auth::user()->name }}" type="hidden">{{ Auth::user()->name }}</option>
                        </select>  
                    </div>
                  </div>
                  <div class="from-group">
                    <div class="form-outline mb-4" style="display: none;">
                        <select name="email" id="email">
                            <option value="{{ Auth::user()->email }}" type="hidden">{{ Auth::user()->email }}</option>
                        </select>  
                    </div>
                  </div>
                  <div class="from-group">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="file">File</label>
                        <input type="file" accept="application/pdf" id="file" name="file" class="form-control"/>
                        <label class="form-label" for="file">*Hanya file PDF, maksimum file 5 MB</label>
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
