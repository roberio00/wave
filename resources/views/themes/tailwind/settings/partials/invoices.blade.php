<div class="p-8">

	@subscriber
        @php
            $subscription = new \Wave\Http\Controllers\SubscriptionController;
            $invoices = $subscription->invoices( auth()->user() );
        @endphp



        @if(isset($invoices->success) && $invoices->success == true)

            <table class="min-w-full overflow-hidden divide-y divide-gray-200 rounded-lg">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100">
                        Data da fatura
                        </th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase bg-gray-100">
                        Preço
                        </th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase bg-gray-100">
                        Link de recibo
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices->response as $invoice)
                        <tr class="@if($loop->index%2 == 0){{ 'bg-gray-50' }}@else{{ 'bg-gray-100' }}@endif">
                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                {{ Carbon\Carbon::parse($invoice->payout_date)->toFormattedDateString() }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium leading-5 text-right text-gray-900 whitespace-no-wrap">
                                ${{ $invoice->amount }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                <a href="{{ $invoice->receipt_url }}" target="_blank" class="mr-2 text-indigo-600 hover:underline focus:outline-none">
                                Download
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p>Desculpe, parece haver um problema ao recuperar suas faturas ou talvez você ainda não tenha faturas.</p>
        @endif

	@notsubscriber
		<p class="text-gray-600">Quando você assina um plano, é aqui que você poderá baixar suas faturas.</p>
		<a href="{{ route('wave.settings', 'plans') }}" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Ver planos</a>
	@endsubscriber

</div>
