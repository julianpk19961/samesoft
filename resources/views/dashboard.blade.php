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

                    <div class="grid-col justify-center space-y-1 my-auto p-1">

                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center">
                            <div class="shrink-0 justify-center m-2">
                                <x-bubble>
                                    <p class="text-slate-500">Macroproceso <br> Estrategico</p>
                                </x-bubble>
                            </div>
                            <div class="grid-col">
                                <ul class="list-inside text-blue-700">
                                    <div class="grid-col">
                                        <li class="list-disc">Direccionamiento estrategico</li>
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="p-3 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-stretch">
                            <div class="shrink-0 justify-center m-2">
                                <x-bubble>
                                    <p class="text-slate-500">Macroproceso <br> Misional</p>
                                </x-bubble>
                            </div>
                            <div class="grid-col">
                                <ul class="list-inside text-blue-700">
                                    <div class="grid-col">
                                        <li class="list-none">
                                            <p class="normal-case">Atención al usuario</p>
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 22"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                            </svg> --}}
                                        </li>
                                        <li class="list-disc">Consulta Externa</li>
                                        <li class="list-disc">CAD</li>
                                        <li class="list-disc">Hospitalización</li>
                                        <li class="list-disc">Servicio Famaceutico</li>
                                    </div>
                                </ul>
                            </div>
                        </div>



                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center">
                            <div class="shrink-0 justify-center m-2">
                                <x-bubble>
                                    <p class="text-slate-500">Macroproceso <br> Apoyo</p>
                                </x-bubble>
                            </div>
                            <div class="grid-col-3">
                                <div class="list-disc">Gestión financiera</div>
                                <div class="list-disc">Gestión de infraestructura y dotación</div>
                                <div class="list-disc">Talento Humano</div>
                                <div class="list-disc">Gestión de compras e inventarios</div>
                                <div class="list-disc">Sistemas de información</div>
                                <div class="list-disc">Gestión documental</div>
                                <div class="list-disc">Seguridad y salud en el trabajo</div>
                            </div>
                        </div>

                        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center">
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
                                <x-bubble>
                                </x-bubble>
                            </div>
                            <div>
                                <div class="text-sm font-light text-gray-800">Necesidades & espectativas</div>
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
