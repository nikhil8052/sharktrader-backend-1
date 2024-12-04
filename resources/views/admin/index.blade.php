@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('home') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Admin Panel</div>
@endsection
@section('content')
    <div class="card-text-white">
        <div class="content p-2" id="content">
            <div class="card-background py-4 text-center fw-bold mb-4">
                Wazzaaap {{$user->name}} !
            </div>
            <div class="card-background p-4 gap-4 d-flex justify-content-between flex-column align-items-start align-content-center">
                <a  href="{{ route('admin-users') }}" class="row p-2 align-items-center  text-decoration-none border-bottom w-100">
                    <div class="col-2">
                        <span class="material-icons">people_outline</span>
                    </div>
                    <div class="col-8">Users</div>
                    <div class="col-2 ">
                        <span class="material-icons">navigate_next</span>
                    </div>
                </a>
                <a  href="{{ route('admin-shark') }}" class="row p-2 align-items-center  text-decoration-none border-bottom w-100">
                    <div class="col-2">
                        <span class="material-icons">pets</span>
                    </div>
                    <div class="col-8">Fox</div>
                    <div class="col-2 ">
                        <span class="material-icons">navigate_next</span>
                    </div>
                </a>
                <a  href="{{ route('cycle.index') }}" class="row p-2 align-items-center  text-decoration-none border-bottom w-100">
                    <div class="col-2">
                        <span class="material-icons">card_membership</span>
                    </div>
                    <div class="col-8">Quant Trades</div>
                    <div class="col-2 ">
                        <span class="material-icons">navigate_next</span>
                    </div>
                </a>
                <a  href="{{ route('strategies.index') }}" class="row p-2 align-items-center  text-decoration-none border-bottom w-100">
                    <div class="col-2">
                        <span class="material-icons">psychology_alt</span>
                    </div>
                    <div class="col-8">Strategies</div>
                    <div class="col-2 ">
                        <span class="material-icons">navigate_next</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
<script>
    function myFunction() {
        var x = document.getElementById("myLinks");
        let content = document.getElementById("content");

        if (x.style.display === "block") {
            x.style.display = "none";
            content.style.display = "block";
        } else {
            x.style.display = "block";
            content.style.display = "none";
        }
    }
</script>

<style>
    /* Style the navigation menu */
    .topnav {
        overflow: hidden;
        background-color: #333;
        position: relative;
    }

    /* Hide the links inside the navigation menu (except for logo/home) */
    .mobile-menu{
        display: none;
    }

    /* Style navigation menu links */
    .topnav a {
        color: white;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        display: block;
    }

    /* Style the hamburger menu */
    .topnav a.icon {
        background: black;
        display: block;
        position: absolute;
        right: 0;
        top: 0;
    }

    /* Add a grey background color on mouse-over */
    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    /* Style the active link (or home/logo) */
    .active {
        background-color: #04AA6D;
        color: white;
    }
    .content{
        display: block;
    }
</style>
