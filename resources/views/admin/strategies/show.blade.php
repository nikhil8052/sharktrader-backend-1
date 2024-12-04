@extends('layouts.content-layout')

@section('previous-button')
<a href="{{ route('strategies.index') }}" class="text-decoration-none ">
    <span class="material-icons">arrow_back_ios_new</span>
</a>
@endsection

@section('title')
<div>Update Strategy</div>
@endsection

@section('content')
@if(session()->has('success') || session()->has('error') )
<toast-dynamic :message="'{{ session()->get('success') }}'" :error="'{{ session()->get('error') }}'"></toast-dynamic>
@endif
<form action="{{ route('strategy.update',['listStrategy'=> $strategy]) }}" method="POST" class="card-background w-100 mt-4 mb-4  p-4">
    @method('patch')
    @csrf
    <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
        <label for="name" class="form-label">Strategy Name</label>
        <input type="text" placeholder="Enter an name" value="{{$strategy->name}}" class="form-control " id="name" name="name">
        @error('name')
        <div style="color: red;" class="form-error">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
    <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
        <label for="posted_by" class="form-label">Posted By</label>
        <input type="text" placeholder="Enter an name" value="{{$strategy->posted_by}}" class="form-control " id="posted_by" name="posted_by">
        @error('posted_by')
        <div style="color: red;" class="form-error">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
    <div class="mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
        <textarea type="text-are" placeholder="Enter details" rows="4" cols="20" value="{!! $strategy->details !!}" class="form-control " id="details" name="details">
            </textarea>
        @error('name')
        <div style="color: red;" class="form-error">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
    <button type="submit" class="menu-button w-100 my-4">Update</button>
</form>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
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
    });
</script>
@endsection