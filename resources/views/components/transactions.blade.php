<table class="table table-striped">
    @forelse ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->uuid }}</td>
            <td>{{ $transaction->date }}</td>
            <td>{{ $transaction->value }}</td>
            <td>{{ $transaction->description }}</td>
        </tr>       
    @empty
        <tr><td colspan="4">Транзакций нет...</td></tr>
    @endforelse
</table>
