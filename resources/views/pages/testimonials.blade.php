@extends('layouts.app', ['page' => __('testimonials'), 'pageSlug' => 'testimonials'])
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
                <h4 class="card-title">Testimonial</h4>
            </div>
          </div>
        </div>
        @if(count($testimonials))
        <div class="card-body">
            <div class="">
                <table class="table tablesorter " id="">
                  <thead class="text-primary">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Testimonials</th>
                      <th scope="col">Creation Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($testimonials as $testimonial)
                      <tr>
                          <td>{{ $testimonial -> name }}</td>
                          <td>{{ Str::limit($testimonial->testimonials, 125) }}</td>
                          <td>{{ $testimonial -> created_at }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                  <div class="stack text-center mt-5 mb-5" style="--stacks: 3;">
                    <span style="--index: 0;">no recent testimonials</span>
                    <span style="--index: 1;">no recent testimonials</span>
                    <span style="--index: 2;">no recent testimonials</span>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<style>
td{
    font-size: 14px;
}
.stack {
  display: grid;
  grid-template-columns: 1fr;
}

.stack span {
  grid-row-start: 1;
  grid-column-start: 1;
  font-size: 50px;
  text-transform: uppercase;
  margin: 0 0 10px 0;
  font-weight: 700;
  color: #FFF;
  --stack-height: calc(100% / var(--stacks) - 1px);
  --inverse-index: calc(calc(var(--stacks) - 1) - var(--index));
  --clip-top: calc(var(--stack-height) * var(--index));
  --clip-bottom: calc(var(--stack-height) * var(--inverse-index));
  clip-path: inset(var(--clip-top) 0 var(--clip-bottom) 0);
  animation: stack 340ms cubic-bezier(.46,.29,0,1.24) 1 backwards calc(var(--index) * 120ms), glitch 2s ease infinite 2s alternate-reverse;
}

.stack span:nth-child(odd) { --glitch-translate: 8px; }
.stack span:nth-child(even) { --glitch-translate: -8px; }

@keyframes stack {
  0% {
    opacity: 0;
    transform: translateX(-50%);
    text-shadow: -2px 3px 0 red, 2px -3px 0 blue;
  };
  60% {
    opacity: 0.5;
    transform: translateX(50%);
  }
  80% {
    transform: none;
    opacity: 1;
    text-shadow: 2px -3px 0 red, -2px 3px 0 blue;
  }
  100% {
    text-shadow: none;
  }
}

@keyframes glitch {
  0% {
    text-shadow: -2px 3px 0 red, 2px -3px 0 blue;
    transform: translate(var(--glitch-translate));
  }
  2% {
    text-shadow: 2px -3px 0 red, -2px 3px 0 blue;
  }
  4%, 100% {  text-shadow: none; transform: none; }
}
</style>
@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
