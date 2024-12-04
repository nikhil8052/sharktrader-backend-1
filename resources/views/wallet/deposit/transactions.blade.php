@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('wallet.deposit.index') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Deposits</div>
@endsection

@section('content')
    <div class="container ">
        <div class="card-background w-100 mt-4 py-2 bg-fade-dark">
            <h2 class="text-center">Deposits</h2>
            <div class="table table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>DateTime</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->payment_id }}</td>
                            <td><strong>{{ $transaction->price_amount }}</strong></td>
                            <td>{{ $transaction->payment_status == 'finished' ? 'Approved' : $transaction->payment_status }}</td>
                            <td>{{ \Carbon\Carbon::createFromDate($transaction->created_at)->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $transactions->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
<script defer>

</script>
<style>
    .code{
        font-size: 12px;
    }
    .description{
        font-size: 13px;
        color: #FFFFFF;
    }
    .page-link{
        color: #000000 !important;
    }
    .page-item.active .page-link{
        color: #FFFFFF !important;
        background-color: #17697EFF;
        border-color: #17697EFF;
    }
</style>
