<div>

    
    

        @foreach ($cartones as $carton)


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            B
                        </th>
                        <th scope="col" class="px-6 py-3">
                            I
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            N
                        </th>
                        <th scope="col" class="px-6 py-3">
                            G
                        </th>
                        <th scope="col" class="px-6 py-3 bg-blue-500">
                            O
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-blue-600 border-b border-blue-400">

                        @foreach (json_decode($carton->content_1) as $item)

                        <th scope="row" class="px-6 py-4 font-medium bg-blue-500 text-blue-50 whitespace-nowrap dark:text-blue-100">
                            {{$item}}
                        </th>

                        @endforeach

                    </tr>

                    <tr class="bg-blue-600 border-b border-blue-400">

                        @foreach (json_decode($carton->content_2) as $item)

                        <th scope="row" class="px-6 py-4 font-medium bg-blue-500 text-blue-50 whitespace-nowrap dark:text-blue-100">
                            {{$item}}
                        </th>

                        @endforeach

                    </tr>

                    <tr class="bg-blue-600 border-b border-blue-400">

                        @foreach (json_decode($carton->content_3) as $item)

                        <th scope="row" class="px-6 py-4 font-medium bg-blue-500 text-blue-50 whitespace-nowrap dark:text-blue-100">
                            {{$item}}
                        </th>

                        @endforeach

                    </tr>

                    <tr class="bg-blue-600 border-b border-blue-400">

                        @foreach (json_decode($carton->content_4) as $item)

                        <th scope="row" class="px-6 py-4 font-medium bg-blue-500 text-blue-50 whitespace-nowrap dark:text-blue-100">
                            {{$item}}
                        </th>

                        @endforeach

                    </tr>

                    <tr class="bg-blue-600 border-b border-blue-400">

                        @foreach (json_decode($carton->content_5) as $item)

                        <th scope="row" class="px-6 py-4 font-medium bg-blue-500 text-blue-50 whitespace-nowrap dark:text-blue-100">
                            {{$item}}
                        </th>

                        @endforeach

                    </tr>

                    
                </tbody>
            </table>
        </div>




      


        @endforeach



        {{-- @foreach ($cartones as $carton)

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

           {{json_decode($carton->content_1)}}

           {{-- @foreach (json_decode($carton->content_b) as $item) 
               <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                   <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
                       <tr>
                           <th scope="col" class="px-6 py-3 bg-blue-500">
                               B
                           </th>
                           <th scope="col" class="px-6 py-3">
                               I
                           </th>
                           <th scope="col" class="px-6 py-3 bg-blue-500">
                               N
                           </th>
                           <th scope="col" class="px-6 py-3">
                               G
                           </th>
                           <th scope="col" class="px-6 py-3 bg-blue-500">
                               O
                           </th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr class="bg-blue-600 border-b border-blue-400">
                           <th scope="row" class="px-6 py-4 font-medium bg-blue-500 text-blue-50 whitespace-nowrap dark:text-blue-100">
                               {{$item}}
                           </th>
                           <td class="px-6 py-4">
                               {{$item}}
                           </td>
                           <td class="px-6 py-4 bg-blue-500">
                               {{$item}}
                           </td>
                           <td class="px-6 py-4">
                               {{$item}}
                           </td>

                           <td class="px-6 py-4 bg-blue-500">
                               {{$item}}
                           </td>
                           
                       </tr>

                       
                   </tbody>
               </table>

           @endforeach --}}
       {{-- </div> 




        @endforeach --}} 


        

    
   
    

</div>
