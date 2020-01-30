@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <h1 class="my-4">{{ $productModel->name }}</h1>

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-3">
                <img class="img-fluid" src="{{ $productModel->image_thumb }}" alt="">
            </div>

            <div class="col-md-9">
                <h3 class="my-3">{{ $productModel->name }}</h3>
                <small>generated at: {{ date('d-m-Y H:i:s', strtotime($productModel->created_at)) }}</small>
                <p>{{ $productModel->description }}</p>
                <h3 class="my-3">{{ $productModel->price }}</h3>
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <h3 class="my-4">Price History</h3>

        <div class="row">

            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($price as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>    
                @endforeach
            </tbody>
            </table>

            <div class="col-12 d-flex justify-content-center pt-5">
                {{ $price->links() }}
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection