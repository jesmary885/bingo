<div>


    <a wire:click="$set('open',true)" class="ml-2 cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
        FICHAS SORTEADAS
    </a>



<x-dialog-modal wire:model="open">

    <x-slot name="title">
        FICHAS GANADORES
    </x-slot>

    <x-slot name="content">

  <hr>

        <div class="flex justify-between w-full mt-4  rounded-lg dark:bg-gray-700 dark:border-gray-600">

 

        </div>

    </x-slot>

    <x-slot name="footer">

        <button wire:click="close" wire:loading.attr="disabled" type="button" class="mr-2 inline-block rounded bg-dark px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
       
            Cerrar
         </button>
  

    </x-slot>

</x-dialog-modal>


</div>
