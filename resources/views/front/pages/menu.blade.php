@extends('front.layouts.main')
@section('content')


    <section class="section-padding bg-dark inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="mt-0 mb-3 text-white">Our Menu</h1>
                    <div class="breadcrumbs">
                        <p class="mb-0 text-white">Menu for you!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container">
            <div class="row no-gutters">
                @foreach ($categories as $key => $category)

                    <div class="col-md-6">

                        <div class="card offer-card shadow-sm mb-4 border-0">
                            <div class="card-body">
                                <h4 class="card-subtitle mb-2 text-block" style="color: rgb(204, 71, 27);">
                                    {{ $category->name }}</h3>

                                    @foreach ($category->items as $key => $item)

                                        <p class="card-text mb-1 pb-1 border-bottom" style="font-size:13px;
                                    color: #7a7e8a;">{{ $item->name }}
                                            <span class="float-right">Rs.{{ $item->price }}</span>
                                        </p>

                                    @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
