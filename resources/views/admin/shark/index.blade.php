@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-panel') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Fox</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'"
                       :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <form action="{{ route('admin-store-shark') }}" method="POST"
          class="card-background w-100 mt-4 mb-4  p-4">
        @csrf
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="amount" class="form-label">Fox Name</label>
            <input type="text" placeholder="Enter an name" min="1" step="any" value="{{ old('name') }}"
                   class="form-control " id="name" name="name">
            @error('name')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="cost" class="form-label">Fox Price</label>
            <input type="number" placeholder="Enter an price"  value="{{ old('cost') }}"
                   class="form-control " id="cost" name="cost">
            @error('cost')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="percentage" class="form-label">Fox Margin</label>
            <input type="number" placeholder="Enter an percentage" value="{{ old('percentage') }}"
                   class="form-control " id="percentage" name="percentage"  min="0" value="0" step="0.01">
            @error('percentage')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="duration" class="form-label">Fox Duration</label>
            <input type="number" placeholder="Enter a duration" value="{{ old('duration') }}"
                   class="form-control " id="duration" name="duration">
            @error('duration')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <button type="submit" class="menu-button w-100 my-4">Store</button>
    </form>
    <div class="card-background container  p-2">
        <table class="table">
            <thead>
            <tr class="">
                <th scope="col">Name</th>
                <th scope="col">Cost</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sharks as $shark)

                <tr class=" ">
                    <td>{{$shark->name}}</td>
                    <td>{{$shark->cost}} USDT</td>
                    <td class="d-flex justify-content-between align-items-center align-content-center">
                        <a href="{{ route('admin-show-shark', $shark) }}" class="btn  btn-success">Update</a>
                        <form method="post" action="{{route('admin-delete-shark', $shark)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn  btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

