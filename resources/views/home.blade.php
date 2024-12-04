@extends('layouts.app')

@section('content')
    <div class="px-2 background-img ">
        <main-menu :reward='@json($reward)' :checkins="{{ json_encode($checkins) }}" :reward_amount='"{{ config('app.reward_amount') }}"'></main-menu>
    </div>




@endsection
<style>
.home-trophy-wrapper {
    border-radius: 15px;
    box-shadow: rgb(0, 0, 0, 0.3) 0px 0px 12px 0px;
}

ol.carousel__pagination {
    padding: 0;
    position: absolute;
    top: 50%;
    right: 0;
    flex-direction: column;
    transform: translateY(-50%);
}

.carousel__pagination-button::after {
    width: 15px !important;
    height: 15px !important;
    border-radius: 50% !important;
}


    .background-img{
{{--        background: url("{{asset('images/home-bg.png')}}");--}}
        width: 100%;
    }
</style>
