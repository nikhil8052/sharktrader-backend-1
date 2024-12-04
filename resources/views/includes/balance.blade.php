<div class="balance-container mb-2">
    <a href="/my-wallet" class="text-decoration-none">
        <div class="container btn-polygon" role="button">
        <div class="text row">
            <div class="col-6 p-2">
                <div class="text-left" style="margin-top: 7px">
                    <h4 class="text-white px-2">
                        Balance
                    </h4>
                </div>
                <div class="text-left">
                    <h4 class="text-white px-2">
                        {{ $wallet->amount }}
                        <img src="/images/Tether-USDT-icon.webp" width="20" alt="USDT">
                    </h4>
                </div>
            </div>
            <div class="col-6">
                <div style="text-align: right">
                    <img src="{{ asset('images/animal.png') }}" width="150" alt="Balance" style="-webkit-transform: scaleX(-1); transform: scaleX(-1);">
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
