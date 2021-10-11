@extends('layouts.main')

@section('title','Home')


@section('content')

    <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="card card-hotels d-flex justify-content-center">

                        <div class="card-header text-center">
                            <h3>Hotels available in the region <i class="fas fa-hotel"></i></h3>
                        </div>

                        <div class="card-body text-center">

                            <table class="table" id="table_id">
                                <thead>
                                <tr>
                                    <th scope="col">Hotel name</th>
                                    <th scope="col">Distance</th>
                                    <th scope="col">Price per Night</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse ($result as $hotel)
                                    <tr>
                                        <td>{{$hotel['hotel_name']}} <i class="fas fa-concierge-bell"></i></td>
                                        <td class="text-nowrap">{{$hotel['hotel_distance']}}km <i class="fas fa-map-marker-alt"></i></td>
                                        <td>{{$hotel['hotel_price']}} EUR <i class="fas fa-coins"></i></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No hotel available</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
            </div>

    </div>
@endsection
