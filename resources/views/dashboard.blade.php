<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="min-h-screen bg-white overflow-hidden shadow-xl sm:rounded-lg object-cover">
                {{-- <x-welcome /> --}}
                {{-- <img src="{{ URL::asset('img/MAPA DE PROCESOS.JPG.jpg') }}"> --}}
                <div class="grid grid-cols-2 min-h-screen bg-gradient-to-r from-cyan-500 to-blue-500 rounded m-5 p-2')]">

                    <div class="grid-col justify-center space-y-1 my-auto">

                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center m-1">
                            <div class="shrink-0 justify-center m-2">
                                <x-bubble>
                                    <p class="text-slate-500">Macroproceso <br> Estrategico</p>
                                </x-bubble>
                            </div>
                            <div class="bg-[#0096ac] min-w-64">
                                <div class=" text-white">
                                    <div class="grid-col-3">
                                        <div class="list-disc">Direccionamiento estrategico</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center m-1">
                            <div class="shrink-0 justify-center m-2">
                                <x-bubble>
                                    <p class="text-slate-500">Macroproceso <br> Misional</p>
                                </x-bubble>
                            </div>
                            <div class="bg-[#0096ac] min-w-32">
                                <div class=" text-white">
                                    <div class="grid-col-3">
                                        <div class="list-disc">Atención al usuario</div>
                                        <div class="list-disc">Consulta Externa</div>
                                        <div class="list-disc">CAD</div>
                                        <div class="list-disc">Hospitalización</div>
                                        <div class="list-disc">Servicio Famaceutico</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center m-1">
                            <div class="shrink-0 justify-center m-2">
                                <x-bubble>
                                    <p class="text-slate-500">Macroproceso <br> Apoyo</p>
                                </x-bubble>
                            </div>
                            <div>
                                <div class="grid-col-3">
                                    <div class="list-disc">Gestión financiera</div>
                                    <div class="list-disc">Gestión de infraestructura y dotación</div>
                                    <div class="list-disc">Talento Humano</div>
                                    <div class="list-disc">Gestión de compras e inventarios</div>
                                    <div class="list-disc">Sistemas de información</div>
                                    <div class="list-disc">Gestión documental</div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center m-1">
                            <div class="shrink-0 justify-center m-2">
                                <x-bubble>
                                    <p class="text-slate-500">Macroproceso <br> Evaluación</p>
                                </x-bubble>
                            </div>
                            <div class="list-disc">
                                Gestión Calidad
                            </div>

                        </div>

                    </div>

                    <div class="grid-col justify-center space-y-1 my-auto">
                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-y-0 m-1">
                            <div class="shrink-0">
                                <x-bubble> </x-bubble>
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">Necesidades & espectativas</div>
                                <p class="text-slate-500">You have a new message!</p>
                            </div>
                        </div>
                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-y-0 m-1">
                            <div class="shrink-0">
                                <x-bubble> </x-bubble>
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">Satisfacción</div>
                                <p class="text-slate-500">You have a new message!</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
