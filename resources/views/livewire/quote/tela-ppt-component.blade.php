<div class="p-6 bg-white rounded-lg shadow-lg">
    <x-form-section submit="calcular">
        <x-slot name="title">
            {{ __('Cálculo de Cotización de Tela con Paspartú') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Ingrese las medidas y valores para el cálculo') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="largo" value="{{ __('Largo (cm)') }}" />
                <x-input id="largo" type="number" class="mt-1 block w-full" wire:model.defer="largo" autocomplete="off" />
                <x-input-error for="largo" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="ancho" value="{{ __('Ancho (cm)') }}" />
                <x-input id="ancho" type="number" class="mt-1 block w-full" wire:model.defer="ancho" autocomplete="off" />
                <x-input-error for="ancho" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="anchoPptIzDe" value="{{ __('Ancho Izq/Der Paspartú (cm)') }}" />
                <x-input id="anchoPptIzDe" type="number" class="mt-1 block w-full" wire:model.defer="anchoPptIzDe" autocomplete="off" />
                <x-input-error for="anchoPptIzDe" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="anchoPptSupInf" value="{{ __('Ancho Sup/Inf Paspartú (cm)') }}" />
                <x-input id="anchoPptSupInf" type="number" class="mt-1 block w-full" wire:model.defer="anchoPptSupInf" autocomplete="off" />
                <x-input-error for="anchoPptSupInf" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="valorMoldura" value="{{ __('Valor Moldura (por metro lineal)') }}" />
                <x-input id="valorMoldura" type="number" class="mt-1 block w-full" wire:model.defer="valorMoldura" autocomplete="off" />
                <x-input-error for="valorMoldura" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="valorLamina" value="{{ __('Valor Lámina (por metro cuadrado)') }}" />
                <x-input id="valorLamina" type="number" class="mt-1 block w-full" wire:model.defer="valorLamina" autocomplete="off" />
                <x-input-error for="valorLamina" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-button>
                {{ __('Calcular') }}
            </x-button>
        </x-slot>
    </x-form-section>

    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ __('Resultados del Cálculo') }}
        </x-slot>

        <x-slot name="content">
            @if($resultados)
                <div>
                    <p><strong>{{ __('Subtotal:') }}</strong> {{ $resultados['subtotal'] }}</p>
                    <p><strong>{{ __('Gastos Generales:') }}</strong> {{ $resultados['gastosGenerales'] }}</p>
                    <p><strong>{{ __('Subtotal con Gastos:') }}</strong> {{ $resultados['subtotalConGastos'] }}</p>
                    <p><strong>{{ __('IVA:') }}</strong> {{ $resultados['iva'] }}</p>
                    <p><strong>{{ __('Total General:') }}</strong> {{ $resultados['totalGeneral'] }}</p>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>