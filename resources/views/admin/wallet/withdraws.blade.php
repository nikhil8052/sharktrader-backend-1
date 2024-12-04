@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-user-wallet', $user) }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Withdraws</div>
@endsection

@section('content')
    <div class="card-background container mt-4 ">
        <h6 class="text-center  pt-2">Withdraws for user : {{ $user->name }}</h6>
        <table class="table">
            <thead>
            <tr class="">
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Address</th>
                <th scope="col">Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($withdraws as $withdraw)
                <tr class=" ">
                    <td class="font-s-10">{{$withdraw->amount}} USDT</td>
                    <td class="font-s-10">{{$withdraw->status}} </td>
                    <td class="font-s-10">{{$withdraw->withdraw_address}} </td>
                    <td class="font-s-10">{{$withdraw->created_at->diffForHumans()}} </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {!! $withdraws->withQueryString()->links('pagination::bootstrap-5') !!}

    </div>
@endsection

