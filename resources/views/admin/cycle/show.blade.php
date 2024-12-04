@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('cycle.index') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Update Quant Trade</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'"
                       :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <form action="{{ route('cycle.update',['quantTrade' => $cycle]) }}" method="POST"
          class="card-background w-100 mt-4 mb-4  p-4">
        @method('patch')
        @csrf
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="price" class="form-label">Cycle Price</label>
            <input type="number" placeholder="Enter an price" min="1" step="any" value="{{$cycle->price}}"
                   class="form-control " id="price" name="price">
            @error('price')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="duration" class="form-label">Cycle Duration</label>
            <input type="number" placeholder="Enter a duration" min="0" step=0.01  value="{{$cycle->duration}}"
                   class="form-control " id="duration" name="duration">
            @error('duration')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <button type="submit" class="menu-button w-100 my-4">Update</button>
    </form>
@endsection

