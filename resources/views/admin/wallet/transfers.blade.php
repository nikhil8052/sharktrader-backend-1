@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-user-wallet', $user)}}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>User Transfers</div>
@endsection

@section('content')
    <div class="card-background container mt-4 ">
        <h4 class="text-center  pt-2">Transfers</h4>
        <table class="table">
            <thead>
            <tr class="">
                <th scope="col">Amount</th>
                <th scope="col">Reciever Email</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transfers as $transfer)
                <tr class=" ">
                    <td>{{$transfer->amount}} USDT</td>
                    <td>{{$transfer->receiver_email}}</td>
                    <td>{{$transfer->created_at->diffForHumans()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $transfers->withQueryString()->links('pagination::bootstrap-5') !!}

    </div>
@endsection

