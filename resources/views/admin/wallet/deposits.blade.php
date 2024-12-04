@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-user-wallet', $user) }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>User deposits</div>
@endsection

@section('content')
    <div class="card-background container mt-4 card-text-white">
        <h4 class="text-center  pt-2">Deposits</h4>
        <table class="table">
            <thead>
            <tr class="">
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($deposits as $deposit)
                <tr class=" ">
                    <td>{{$deposit->amount}} USDT</td>
                    <td>{{$deposit->status}} </td>
                    <td>{{$deposit->created_at->diffForHumans()}} </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {!! $deposits->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection
@section('style')
    <style>
        .card-text-white{
            color: #fff;
        }
        .card-text-white table{
            color: #fff;
        }
    </style>
@endsection

