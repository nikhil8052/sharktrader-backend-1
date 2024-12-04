@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-users') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>User Wallet</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'" :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <div class="card-background container mt-4 card-text-white">
        <div class=" text-center py-4">
            <h4>{{$user->name }} Wallet</h4>
            <div class="m-auto">
                <div class="d-flex justify-content-center align-items-center align-content-center gap-2">
                    <div class="fw-bold">
                        {{$user->wallet->amount }}
                    </div>
                    <img style="width: 25px;" src="{{ asset('/images/Tether-USDT-icon.webp') }}" alt="logo">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{route('admin-user-deposits',$user)}}" class="btn btn-success">Deposits</a>
            <a href="{{route('admin-user-withdraws',$user)}}" class="btn btn-success">Withdraws</a>
            <a href="{{route('admin-user-transfers',$user)}}" class="btn btn-success">Transfers</a>
        </div>
    </div>
    <div class="card-background mt-4 card-text-white">
        <h5 class="text-center ">Pending Approvals</h5>
        <table class="table">
            <thead>
            <tr class="">
                <th scope="col">Amount</th>
                <th scope="col">Address</th>
                <th scope="col">Created</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pendingApprovals as $withdraw)
                <tr class=" ">
                    <td class="font-s-10">{{$withdraw->amount}} USDT</td>
                    <td class="font-s-10" >{{$withdraw->withdraw_address}} </td>
                    <td class="font-s-10">{{$withdraw->created_at->diffForHumans()}} </td>
                    <td class="font-s-10">
                        <form action="{{ route('admin-approve-withdraw') }}" method="post">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" value="{{$withdraw->id}}" name="id">
                            <input type="hidden" value="{{$withdraw->wallet_id}}" name="wallet_id">
                            <input type="hidden" value="{{$withdraw->amount}}" name="amount">
                            <button type="submit" class="btn btn-outline-success">Approve</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {!! $pendingApprovals->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection

@section('style')

@endsection
