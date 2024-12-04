@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-shark') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Update Fox</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'"
                       :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <form action="{{ route('admin-update-shark',['shark'=>$shark]) }}" method="POST"
          class="card-background w-100 mt-4 mb-4  p-4">
        @method('patch')
        @csrf
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="amount" class="form-label">Fox Name</label>
            <input type="text" placeholder="Enter an name"  value="{{$shark->name}}"
                   class="form-control " id="name" name="name">
            @error('name')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="cost" class="form-label">Fox Price</label>
            <input type="number" placeholder="Enter an price"  value="{{$shark->cost}}"
                   class="form-control " id="cost" name="cost">
            @error('cost')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="percentage" class="form-label">Fox Margin</label>
            <input type="text" placeholder="Enter an percentage" value="{{$shark->percentage}}"
                   class="form-control " id="percentage" name="percentage">
            @error('percentage')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="duration" class="form-label">Fox Duration</label>
            <input type="number" placeholder="Enter a duration" value="{{$shark->duration}}"
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

