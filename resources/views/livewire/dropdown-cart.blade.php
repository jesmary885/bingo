<div>
    <x-dropdown width="152">
        <x-slot name="trigger">
            <span class="relative  inline-block cursor-pointer   ">
                <x-cart color="gray" size="30" />

                @if (Cart::count())
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                @else
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span></span>    
                 @endif 

                
                
            </span>
        </x-slot>

        <x-slot name="content"> 

             <ul class=" overflow-auto h-96 ">
                @forelse (Cart::content() as $item)
                    <li class=" p-2 border-b border-gray-200">
                        <div class="w-full" >
                            @livewire('cartonview',['carton'=> $item->options['carton'],key($item->id)])
                        </div>

                        <div class="flex" >

                            <p class="text-xs text-white" > ssssssssssssssssssssssssssssssss</p>

                        </div>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            @if (Cart::count())
                <div class="py-2 px-3">
                    <p class="text-lg text-gray-700 mt-2 mb-3"><span class="font-bold">Total:</span> USD {{ Cart::subtotal() }}</p>


                     <x-button-enlace href="{{ route('shopping-cart') }}" color="blue" class="w-full">
                        <svg class="w-3.5 h-3.5 me-2 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        Ir al carrito de compras
                    </x-button-enlace> 


                </div>
            @endif


        </x-slot>
    </x-dropdown>
</div>
