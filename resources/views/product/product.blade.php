@extends('layouts.app', ['page' => __('all product'), 'pageSlug' => 'all product'])
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">All Product</h4>
                        </div>
                    </div>
                </div>
                <form class="form mb-4 mt-2" method="get" action="/searchAllProduct">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-6">
                        <div class="form">
                            <input type="search" name="search" class="form-control form-input" placeholder="Search...">
                        </div>
                        </div>
                    </div>
                </form>
                @if(count($products))
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class="text-primary" style="text-align: center">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Desc</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Visibility</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                                @foreach ($products as $product)
                                <tbody style="text-align: center">
                                    <tr>
                                        <td>{{ $product -> name }}</td>
                                        <td>{{ $product -> price }}</td>
                                        <td>{{ $product -> desc }}</td>
                                        <td>{{ $product -> setStock ? 'Available' : 'Not Available'; }}</td>
                                        <td>{{ $product -> setVisible ? 'Visible' : 'Hide'; }}</td>
                                        <td>{{ $product -> setStatus ? 'Accpeted' : 'Waiting'; }}</td>
                                        <td>
                                            <img class="img-{{ $product->product_id }}" style="width: 100px; height: 150px" src="{{ asset('images/'.$product->image) }}">
                                        </td>
                                        <td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a>
                                                            <form action="{{route('user.productDestroy', $product->product_id)}}" method="POST">
                                                                @csrf
                                                                @method("delete")
                                                                <button type="submit" class="dropdown-item">Delete</button>
                                                            </form>
                                                        </a>
                                                        <a>
                                                            <?php if($product->setStock == 1){ ?> 
                                                                <a href="{{url('/updateStock',$product->product_id)}}" class="dropdown-item">Not Available</a>
                                                            <?php }else{ ?> 
                                                                <a href="{{url('/updateStock',$product->product_id)}}" class="dropdown-item">Available</a>
                                                            <?php } ?>
                                                        </a>
                                                        <a>
                                                            <?php if($product->setVisible == 1){ ?> 
                                                                <a href="{{url('/updateVisible',$product->product_id)}}" class="dropdown-item">Hide</a>
                                                            <?php }else{ ?> 
                                                                <a href="{{url('/updateVisible',$product->product_id)}}" class="dropdown-item">Display</a>
                                                            <?php } ?>
                                                        </a>
                                                        <a>
                                                            <?php if($product->setStatus == 1){ ?> 
                                                                <a href="{{url('/updateStatusProduct',$product->product_id)}}" class="dropdown-item">Drop</a>
                                                            <?php }else{ ?> 
                                                                <a href="{{url('/updateStatusProduct',$product->product_id)}}" class="dropdown-item">Approve</a>
                                                            <?php } ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="stack text-center mt-5 mb-5" style="--stacks: 3;">
                                <span style="--index: 0;">There are no products</span>
                                <span style="--index: 1;">There are no products</span>
                                <span style="--index: 2;">There are no products</span>
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
