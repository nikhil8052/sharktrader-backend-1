@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('cycle.index') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Send SpiderWeb to user</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'"
                       :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <form action="{{ route('send-fox-post', $user) }}" method="POST"
          class="card-background w-100 mt-4 mb-4  p-4">
        @csrf
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="price" class="form-label">Fox Name</label>
            <input type="text" placeholder="Enter an fox name"
                   class="form-control " id="fox" name="fox">
            @error('fox')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <button type="submit" class="menu-button w-100 my-4">Send</button>
    </form>
    <div class="row">
        <h5 class=" text-center">
            Active Foxes
        </h5>
        <div class=" p-2">
            @if(count($activeSharks) == 0)
                <div class=" text-center">
                    NO FOXES
                </div>
            @else
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Fox name</th>
                        <th scope="col">Fox margin</th>
                        <th scope="col">Fox duration</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($activeSharks as $shark)

                        <tr>
                        <td> {{$shark->name}}</td>
                        <td>  {{$shark->percentage}}</td>
                        <td> {{$shark->duration}}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

