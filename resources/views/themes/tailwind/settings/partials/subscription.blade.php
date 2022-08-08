<div class="p-8">
    @if(auth()->user()->hasRole('admin'))
        <p>Este usuário é um usuário administrador e, portanto, não precisa de uma assinatura</p>
    @else
        @if(auth()->user()->subscriber())
            <div class="flex flex-col">
                <h5 class="mb-2 text-xl font-bold text-gray-700">Modificar informações de pagamento</h5>
                <p>Clique no botão abaixo para atualizar sua forma de pagamento padrão</p>
                <button data-url="{{ auth()->user()->subscription->update_url }}" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md checkout-update bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Update Payment Info</button>
            </div>

            <hr class="my-8 border-gray-200">

            <div class="flex flex-col">
                <h5 class="mb-2 text-xl font-bold text-gray-700">Zona de perigo</h5>
                <p class="text-red-400">Clique no botão abaixo para cancelar sua assinatura.</p>
                <p class="text-xs">Observação: sua conta será imediatamente rebaixada.</p>
                <button onclick="cancelClicked()" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:border-red-600 focus:shadow-outline-red-500 active:bg-red-600">Cancelar assinatura</button>
            </div>

	        @include('theme::partials.cancel-modal')
        @else
            <p class="text-gray-600">Please <a href="{{ route('wave.settings', 'plans') }}">Assine um plano</a> para ver as informações de sua assinatura.</p>
            <a href="{{ route('wave.settings', 'plans') }}" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Ver planos</a>
        @endif
    @endif
</div>
<script>
	window.cancelClicked = function(){
		Alpine.store('confirmCancel').openModal();
	}
</script>