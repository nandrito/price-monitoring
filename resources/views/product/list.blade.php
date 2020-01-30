@extends('layouts.app');

@section('content')
    <div class="container py-5">
    <div class="row text-center  mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4">Product List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                @foreach ($product as $p)
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="pr-3"><img src="{{ $p->image_thumb }}"></div>
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">
                                <a href="{{ route('products.show',$p->id) }}">{{ $p->name }}</a>
                            </h5>
                            <p class="font-italic text-muted mb-0 small">{{ substr($p->description,0,150) }}...</p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{ $p->price }}</h6>
                            </div>
                        </div>
                    </div> <!-- End -->
                </li> <!-- End -->    
                @endforeach
            </ul> <!-- End -->    
        </div>
        <div class="col-12 d-flex justify-content-center pt-5">
            {{ $product->links() }}
        </div>
    </div>
@endsection