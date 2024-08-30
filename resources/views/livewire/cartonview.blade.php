<div>

    <div class="  bg-blue-600 rounded-t-md shadow-md overflow-hidden ">

        <div class="grid grid-cols-5 gap-0.5 justify-center mb-1 mt-1">  

            <div class=" bg-blue-600 text-white justify-center text-xs text-center   font-bold">B</div>  
            <div class=" bg-blue-600 text-white justify-center text-xs  text-center   font-bold">I</div>  
            <div class=" bg-blue-600 text-white justify-center text-xs  text-center   font-bold">N</div>  
            <div class=" bg-blue-600 text-white justify-center text-xs  text-center   font-bold">G</div>  
            <div class=" bg-blue-600 text-white justify-center text-xs  text-center font-bold">O</div>  
        </div>  

        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 ">  
            @foreach (json_decode($carton_s->content_1) as $item)
                <div class="bg-gray-100 text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
            @endforeach
        </div>  

        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1">  
            @foreach (json_decode($carton_s->content_2) as $item)
                <div class="bg-gray-100 text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
            @endforeach
        </div> 

        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1">  
            @foreach (json_decode($carton_s->content_3) as $item)
                <div class="bg-gray-100 text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
            @endforeach
        </div> 

        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1">  
            @foreach (json_decode($carton_s->content_4) as $item)
                <div class="bg-gray-100 text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
            @endforeach
        </div> 

        <div class="grid grid-cols-5 gap-0.5 justify-center ml-1 mr-1 mb-1">  
            @foreach (json_decode($carton_s->content_5) as $item)
                <div class="bg-gray-100 text-xs justify-center text-center py-2 font-bold">{{$item}}</div>  
            @endforeach
        </div> 


    </div> 

</div>
