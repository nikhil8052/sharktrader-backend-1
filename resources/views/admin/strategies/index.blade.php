@extends('layouts.content-layout')

@section('previous-button')
<a href="{{ route('admin-panel') }}" class="text-decoration-none ">
    <span class="material-icons">arrow_back_ios_new</span>
</a>
@endsection

@section('title')
<div>Strategy</div>
@endsection

@section('content')
@if(session()->has('success') || session()->has('error') )
<toast-dynamic :message="'{{ session()->get('success') }}'" :error="'{{ session()->get('error') }}'"></toast-dynamic>
@endif
<form action="{{ route('strategies.store') }}" method="POST" class="card-background w-100 mt-4 mb-4  p-4">
    @csrf
    <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
        <label for="name" class="form-label">Strategy Name</label>
        <input type="text" placeholder="Enter an name" value="{{ old('name') }}" class="form-control " id="name" name="name">
        @error('name')
        <div style="color: red;" class="form-error">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
    <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
        <label for="posted_by" class="form-label">Posted By</label>
        <input type="text" placeholder="Enter an name" value="{{ old('posted_by') }}" class="form-control " id="posted_by" name="posted_by">
        @error('posted_by')
        <div style="color: red;" class="form-error">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>


    <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">


        <textarea placeholder="Your Text here" class="form-control " id="details" value="{{ old('details') }}" name="details">

        </textarea>
        @error('details')
        <div style="color: red;" class="form-error">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>


    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ]
        });
    </script>
    <button type="submit" class="menu-button w-100 my-4">Store</button>
</form>
<div class="card-background container  p-2">
    <table class="table">
        <thead>
            <tr class="">
                <th scope="col">Name</th>
                <th scope="col">Posted By</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($strategies as $strategy)
            <tr class=" ">
                <td>{{$strategy->name}}</td>
                <td>{{$strategy->posted_by}}</td>
                <td class="d-flex justify-content-between align-items-center align-content-center">
                    <a href="{{ route('admin-show-strategy', ['listStrategy' =>$strategy]) }}" class="btn  btn-success">Update</a>
                    <form method="post" action="{{route('admin-delete-strategy', ['listStrategy' => $strategy])}}">
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