@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-users') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Info</div>
@endsection

@section('content')
    <div class="card-background container p-2 mt-4  ">
        <a href="{{ route('send-fox', $user) }}" class="btn btn-outline-success">Send SpiderWeb</a>
    </div>

    <div class="card-background container p-2 mt-4  ">
        <div class="d-flex justify-content-between align-content-center align-items-center py-4">
            <div class="text-center  fw-bold pt-2">Referral Code : {{$user->referral_code}}</div>
            <div class="d-flex justify-content-between flex-column align-content-end align-items-end">
                <div class="d-flex justify-content-between align-items-center align-content-center gap-2 pt-2">
                    <div class="fw-bold">
                        Accumulated Commission:
                    </div>
                    <div class=" fw-bold">{{$myteam->accumulated_commission}}</div>
                    <img style="width: 25px;" src="{{asset('/images/Tether-USDT-icon.webp')}}" alt="usdt">
                </div>
                <div class="d-flex justify-content-between align-items-center align-content-center gap-2 pt-2">
                    <div class="fw-bold">
                        Received Commission:
                    </div>
                    <div class=" fw-bold">{{$myteam->received_commission}}</div>
                    <img style="width: 25px;" src="{{asset('/images/Tether-USDT-icon.webp')}}" alt="usdt">
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr class="">
                <th scope="col">Team member</th>
                <th scope="col">Team member Email</th>
                <th scope="col">Verified</th>
            </tr>
            </thead>
            <tbody>
            @foreach($myteam->users as $team_member)
                <tr class=" ">
                    <td>{{$team_member->name}}</td>
                    <td>{{$team_member->email}}</td>
                    <td>{{is_null($team_member->email_verified_at) ? 'Not Verified' : 'Verified'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--                {!! $myteam->withQueryString()->links('pagination::bootstrap-5') !!}--}}

    </div>

@endsection

