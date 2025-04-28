<div >

    @if($iniciar == 0)

        <div class="m-20 bg-gray-50 " >

            <button wire:click="iniciar_sorteo()" type="button" class="btn btn-primary btn-lg btn-block">Haz click aquí para iniciar el sorteo</button>
        </div>

    @endif

    @if($iniciar == 1)

        <div class="md:flex w-full  ">

            <div class="card card-primary card-outline w-1/3 mr-1 ">

                @if($finalizo == 1)
                    <x-button-enlace wire:click="finalizar()" class="mt-2 font-Allerta">
                        FINALIZAR SORTEO
                    </x-button-enlace>
                @endif


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

            <div class=" card card-primary card-outline w-2/3 ml-1 ">
                <h2 class="font-extrabold text-blue-600 text-center p-4 text-2xl  ">FICHAS </h2>

                <div class="border-t border-gray-200 mb-6"></div>

            <div>

            <div class="relative overflow-x-auto shadow-md  px-8">
                <table class="w-full rounded-lg  text-sm  text-gray-500 dark:text-gray-400">
                    <thead class="text-lg uppercase bg-blue-600 dark:bg-gray-800 text-white shadow-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                B
                            </th>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                I
                            </th>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                N
                            </th>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                G
                            </th>
                            <th scope="col" class="px-6 py-3 text-center transform hover:scale-105 transition-transform duration-200 active:translate-y-1 border-b-4 border-blue-400 text-xl dark:border-gray-600 font-extrabold">
                                O
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-yellow-200 border-r dark:bg-gray-800 dark:border-gray-700  border-gray-200">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border border-r-black {{$this->cambio_color('1')}} flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">1</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('16')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">16</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('31')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">31</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('46')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">46</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('61')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">61</div>
                            </td>
                        </tr>
                        <tr class="bg-yellow-200 border-r dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('2')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">2</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('17')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">17</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('32')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">32</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('47')}}   flex items-center justify-center mx-auto shadow-m text-xl font-extrabold text-blue-700">47</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('62')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">62</div>
                            </td>
                        </tr>
                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('3')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">3</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('18')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">18</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('33')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">33</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('48')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">48</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('63')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">63</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black  {{$this->cambio_color('4')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">4</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('19')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">19</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('34')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">34</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('49')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">49</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('64')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">64</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('5')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">5</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('20')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">20</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('35')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">35</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('50')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">50</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('65')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">65</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('6')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">6</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('21')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">21</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('36')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">36</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('51')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">51</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('66')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">66</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('7')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">7</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('22')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">22</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('37')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">37</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('52')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">52</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('67')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">67</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('8')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">8</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('23')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">23</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('38')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">38</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('53')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">53</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('68')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">68</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('9')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">9</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('24')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">24</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('39')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">39</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('54')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">54</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('69')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">69</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('10')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">10</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('25')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">25</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('40')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">40</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('55')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">55</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('70')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">70</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('11')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">11</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('26')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">26</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('41')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">41</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('56')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">56</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('71')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">71</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('12')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">12</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('27')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">27</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('42')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">42</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('57')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">57</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('72')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">72</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('13')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">13</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('28')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">28</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('43')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">43</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('58')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">58</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('73')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">73</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap dark:">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('14')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">14</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('29')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">29</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('44')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">44</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('59')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">59</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('74')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">74</div>
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 border-r dark:bg-gray-800">
                            <th scope="row" class="px-6 border-l border-r font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('15')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">15</div>
                            </th>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('30')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">30</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('45')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">45</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 border-r  whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('60')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">60</div>
                            </td>
                            <td class="px-6 font-medium text-gray-900 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-full border-r-black {{$this->cambio_color('75')}}   flex items-center justify-center mx-auto shadow-md text-xl font-extrabold text-blue-700">75</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>


    @endif
</div>
