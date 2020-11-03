<div class="space-y-8 divide-y table-list-mobile">
    @foreach ($payments as $payment)
        <div class="space-y-3 table-list-mobile-row">
            <x-tables.rows.mobile.multipayment-recipient :model="$payment" />

            <x-tables.rows.mobile.amount :model="$payment" />
        </div>
    @endforeach
</div>