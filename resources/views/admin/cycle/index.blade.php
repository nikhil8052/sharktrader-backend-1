@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('admin-panel') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Quant Trade</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'" :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <form action="{{ route('cycle.store') }}" method="POST"
          class="card-background w-100 mt-4 mb-4  p-4">
        @csrf
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="price" class="form-label">Cycle Cost</label>
            <input type="number" placeholder="Enter an price" min="1" step="any" value="{{ old('price') }}"
                   class="form-control " id="price" name="price">
            @error('price')
            <div style="color: red;" class="form-error">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
            <label for="duration" class="form-label">Cycle Duration</label>
            <input type="number" placeholder="Enter a duration" min="1"  step="1" value="{{ old('duration') }}"
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
                <th scope="col">Duration</th>
                <th scope="col">Cost</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cycles as $cycle)

                <tr class=" ">
                    <td>{{$cycle->duration}}</td>
                    <td>{{$cycle->price}} USDT</td>
                    <td class="d-flex justify-content-between align-items-center align-content-center">
                        <a href="{{ route('admin-show-cycle', ['quantTrade' => $cycle]) }}" class="btn  btn-success">Update</a>
                        <form method="post" action="{{route('admin-delete-cycle', ['quantTrade' => $cycle])}}">
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

