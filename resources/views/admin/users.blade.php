@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-panel') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Users</div>
@endsection

@section('content')
    <div class="card-background my-2 p-2 card-text-white">
        <form method="GET">
            <div class="input-group">
                <div class="form-outline d-flex align-items-end align-content-end justify-content-end gap-2">
                    <input
                            type="text"
                            name="search"
                            value="{{ request()->get('search')}}"
                            class="form-control text-black bg-white"
                            placeholder="Search user by email"
                            aria-label="Search"
                            aria-describedby="button-addon2">
                        <input
                            type="number"
                            name="search_id"
                            value="{{ request()->get('search_id') }}"
                            class="form-control text-black bg-white"
                            placeholder="Search user by ID"
                            aria-label="Search"
                            aria-describedby="button-addon2">
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-background container card-text-white">
        <table class="table">
            <thead>
            <tr class="">
                <th scope="col">Email</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr class=" ">
                    <td>{{$user->email}}</td>
                    <td class="d-flex justify-content-between align-items-center">
                        <a href="{{route('admin-user-wallet',$user->id)}}" class="btn btn-success">Wallet</a>
                        <a href="{{route('admin-user-info',$user->id)}}" class="btn btn-info">Info</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="margin: 0 auto;">
            {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection

