@extends('layouts.app')

@section('content')
    <div class="">
        <user-menu :user='@json($user)' :wallet='@json($wallet)'/>
    </div>
    <div class="container  pb-3">
        <div class="m-auto" style="width: 98%;">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="w-100 menu-button mt-4 bg-white btn-polygon fw-bold">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection
<script>
    import UserMenu from "../js/components/Menus/UserMenu";

    export default {
        components: {
            UserMenu,
        }
    }
</script>
<style>
    .bg {
        background-color: white;
    }
</style>
