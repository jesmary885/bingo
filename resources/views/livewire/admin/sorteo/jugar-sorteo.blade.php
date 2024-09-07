<div >

    @if($iniciar == 0)

        <div class="m-20 bg-gray-50 " >

            <button wire:click="iniciar_sorteo()" type="button" class="btn btn-primary btn-lg btn-block">Haz click aquí para iniciar el sorteo</button>
        </div>

    @endif

    @if($iniciar == 1)

        <div class="md:flex w-full h-screen ">

            <div class="card card-primary card-outline w-full mr-1 ">

                <h2 class="font-bold text-blue-600 text-center p-4" >Seleccione el valor de la ficha </h2>

                <div class="border-t border-gray-200 mb-2"></div>

                <div class="flex justify-center">

                    <button wire:click="letra('B')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">B</button>
                    <button wire:click="letra('I')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">I</button>
                    <button wire:click="letra('N')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">N</button>
                    <button wire:click="letra('G')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">G</button>
                    <button wire:click="letra('O')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">O</button>

                </div>

                <div class="border-t border-gray-200 mb-6"></div>

                @if($letra_select == 'B')

                <div class="grid md:grid-cols-4 lg:grid-cols-5 gap-4">

                    <button wire:click="numero('1')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">1</button>
                    <button wire:click="numero('2')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">2</button>
                    <button wire:click="numero('3')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">3</button>
                    <button wire:click="numero('4')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">4</button>
                    <button wire:click="numero('5')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">5</button>
                    <button wire:click="numero('6')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">6</button>
                    <button wire:click="numero('7')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">7</button>
                    <button wire:click="numero('8')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">8</button>
                    <button wire:click="numero('9')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">9</button>
                    <button wire:click="numero('10')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">10</button>
                    <button wire:click="numero('11')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">11</button>
                    <button wire:click="numero('12')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">12</button>
                    <button wire:click="numero('13')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">13</button>
                    <button wire:click="numero('14')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">14</button>
                    <button wire:click="numero('15')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">15</button>



                </div>

                @endif

                @if($letra_select == 'I')

                <div class="grid md:grid-cols-4 lg:grid-cols-5 gap-4">

                    <button wire:click="numero('16')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">16</button>
                    <button wire:click="numero('17')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">17</button>
                    <button wire:click="numero('18')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">18</button>
                    <button wire:click="numero('19')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">19</button>
                    <button wire:click="numero('20')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">20</button>
                    <button wire:click="numero('21')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">21</button>
                    <button wire:click="numero('22')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">22</button>
                    <button wire:click="numero('23')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">23</button>
                    <button wire:click="numero('24')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">24</button>
                    <button wire:click="numero('25')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">25</button>
                    <button wire:click="numero('26')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">26</button>
                    <button wire:click="numero('27')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">27</button>
                    <button wire:click="numero('28')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">28</button>
                    <button wire:click="numero('29')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">29</button>
                    <button wire:click="numero('30')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">30</button>



                </div>

                @endif

                @if($letra_select == 'N')

                <div class="grid md:grid-cols-4 lg:grid-cols-5 gap-4">

                    <button wire:click="numero('31')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">31</button>
                    <button wire:click="numero('32')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">32</button>
                    <button wire:click="numero('33')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">33</button>
                    <button wire:click="numero('34')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">34</button>
                    <button wire:click="numero('35')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">35</button>
                    <button wire:click="numero('36')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">36</button>
                    <button wire:click="numero('37')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">37</button>
                    <button wire:click="numero('38')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">38</button>
                    <button wire:click="numero('39')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">39</button>
                    <button wire:click="numero('40')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">40</button>
                    <button wire:click="numero('41')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">41</button>
                    <button wire:click="numero('42')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">42</button>
                    <button wire:click="numero('43')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">43</button>
                    <button wire:click="numero('44')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">44</button>
                    <button wire:click="numero('45')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">45</button>



                </div>

                @endif

                @if($letra_select == 'G')

                <div class="grid md:grid-cols-4 lg:grid-cols-5 gap-4">

                    <button wire:click="numero('46')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">46</button>
                    <button wire:click="numero('47')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">47</button>
                    <button wire:click="numero('48')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">48</button>
                    <button wire:click="numero('49')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">49</button>
                    <button wire:click="numero('50')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">50</button>
                    <button wire:click="numero('51')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">51</button>
                    <button wire:click="numero('52')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">52</button>
                    <button wire:click="numero('53')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">53</button>
                    <button wire:click="numero('54')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">54</button>
                    <button wire:click="numero('55')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">55</button>
                    <button wire:click="numero('56')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">56</button>
                    <button wire:click="numero('57')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">57</button>
                    <button wire:click="numero('58')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">58</button>
                    <button wire:click="numero('59')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">59</button>
                    <button wire:click="numero('60')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">60</button>



                </div>

                @endif

                @if($letra_select == 'O')

                <div class="grid md:grid-cols-4 lg:grid-cols-5 gap-4">

                    <button wire:click="numero('61')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">61</button>
                    <button wire:click="numero('62')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">62</button>
                    <button wire:click="numero('63')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">63</button>
                    <button wire:click="numero('64')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">64</button>
                    <button wire:click="numero('65')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">65</button>
                    <button wire:click="numero('66')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">66</button>
                    <button wire:click="numero('67')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">67</button>
                    <button wire:click="numero('68')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">68</button>
                    <button wire:click="numero('69')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">69</button>
                    <button wire:click="numero('70')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">70</button>
                    <button wire:click="numero('71')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">71</button>
                    <button wire:click="numero('72')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">72</button>
                    <button wire:click="numero('73')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">73</button>
                    <button wire:click="numero('74')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">74</button>
                    <button wire:click="numero('75')" type="button" class="btn btn-outline-primary text-3xl font-bold m-2">75</button>

                </div>

                @endif



        



            </div>

            <div class=" card card-primary card-outline w-full ml-1 ">

                <h2 class="font-bold text-blue-600 text-center p-4 ">Fichas resultantes </h2>

                <div class="border-t border-gray-200 mb-6"></div>

                <div class="grid grid-cols-3 lg:grid-cols-4 gap-4">

                @forelse($fichas as $ficha)

                <div class="flex flex-col " >

                    <button  type="button" class="btn btn-outline-primary text-base md:text-xl font-bold MR-2">{{$ficha->letra}} - {{$ficha->numero}}</button>
                    <button type="button" wire:click="eliminar_ficha('{{$ficha->id}}')" class="btn btn-danger btn-sm ">Eliminar</button>

                </div>



            







                @endforeach

                </div>


            </div>

        </div>


        @if($ganador == 1)

        <p>ha ganado el carton nro </p>
        @endif

    @endif


</div>
