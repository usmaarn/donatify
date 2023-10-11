<div>
    <h1 class="text-2xl font-medium">My Donations</h1>

    <table class="space-y-5 my-16 border">
        <thead>
            <tr class="text-left">
                <th class="px-3 border py-2">Donation</th>
                <th class="px-3 border">Amount</th>
                <th class="px-3 border">Date</th>
            </tr>
        </thead>
        @forelse($donations as $transaction)
          <tr>
              <td class="px-3 border py-2">{{ $transaction->donation->title }}</td>
              <td class="px-3 border">{{ $transaction->amount }}</td>
              <td class="px-3 border">{{ $transaction->created_at }}</td>
          </tr>

        @empty
            <tr>No Donations yet</tr>
        @endforelse
    </table>
</div>
