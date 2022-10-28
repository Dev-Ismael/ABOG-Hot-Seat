@extends('layouts.app')

@section('FrontContent')


    <div class="main-content pt--125">
        <div class="rwt-split-area rn-section-gap">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-12 mb--40">
                        <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                            <i class="fa-solid fa-circle-check text-success fa-4x"></i>
                            <br><br>
                            <h4 class="title w-600 mb--20"> {{ $messege }} </h4>
                            <div class="form-group">
                                <a href="{{ route($link) }}" class="btn-default btn-large rn-btn">
                                    <span> {{ ucfirst($link) }} Page </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
