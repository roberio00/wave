<!-- Switch Plans Confirmation -->
<div x-data x-init="
	$watch('$store.plan_modal.open', value => {
	if (value === true) { document.body.classList.add('overflow-hidden') }
	else { document.body.classList.remove('overflow-hidden') }
	});" id="switchPlansModal" x-show="$store.plan_modal.open" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
	<div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
		<div x-show="$store.plan_modal.open" x-on:click="$store.plan_modal.close()" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
			<div class="absolute inset-0 bg-black opacity-50"></div>
		</div>

		<span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
		<div x-show="$store.plan_modal.open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" role="dialog">
			<div class="flex flex-col justify-between w-full mt-2">
				<div class="flex flex-col items-center">
					<div class="flex items-center justify-center w-12 h-12 mx-auto text-center rounded-full bg-wave-100">
                        <svg class="w-6 h-6 text-wave-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z"></path></svg>
					</div>
					<div class="mt-3 text-center sm:ml-4">
						<h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-headline">
						Mude de plano aqui
						</h3>
						<div class="mt-1">
							<p class="text-sm leading-5 text-gray-500">Tem certeza de que deseja mudar para o plano <span x-text="$store.plan_modal.plan_name"></span>?</p>
						</div>
					</div>
				</div>
				<div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
					<div class="flex flex-1 w-full rounded-md shadow-sm sm:ml-3 sm:w-full">
                        <form id="form" action="{{ route('wave.switch-plans') }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out border border-transparent rounded-md shadow-sm cursor-pointer bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave sm:text-sm sm:leading-5">
							Sim, mudar meu plano
                            </button>
                            <input type="hidden" name="plan_id" :value="$store.plan_modal.plan_id">
                        </form>
					</div>
					<span class="flex flex-1 w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-full">
						<button @click="$store.plan_modal.close();" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">
						Não, obrigado
						</button>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END Switch Plans Confirmation -->
