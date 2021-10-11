@extends('layouts.main')

@section('title','Home')


@section('content')

    <div class="container">
            <div class="d-flex align-items-center justify-content-center" style="height: 40rem" >
                <div  class="col-md-5">
                    <form id="form" method="POST" action="/hotels">
                        @csrf
                        <input id="latitude" type="hidden" name="latitude">
                        <input id="longitude" type="hidden" name="longitude">
                        <img src="svg/Hotel Booking-amico.svg" alt="banner_hotel">
                        <div class="d-flex justify-content-center">
                            <button type="button" onclick="getLocation()" class="btn button-list">Click here to list
                                all
                                hotels near you
                                <i class="fas fa-map-marked-alt fa-2x"></i>
                            </button>
                        </div>
                        <div id="alertErro" class="alert alert-danger m-2" role="alert" style="display: none">
                        </div>
                    </form>

                </div>
            </div>
    </div>
@endsection
