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
                                <div class="grid grid-col text-sky-700">

                                    <p class=""> Direccionamiento estrategico </p>

                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <title>"Direccionamiento estratégico"</title>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                                    </svg> --}}

                                </div>
                            </div>
                        </div>

                        <div class="p-3 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-stretch">
                            <div class="shrink-0 justify-center m-2">
                                <x-bubble>
                                    <p class="text-slate-500">Macroproceso <br> Misional</p>
                                </x-bubble>
                            </div>
                            <div class="grid-col">
                                <ul class="grid grid-cols-4 gap-4">
                                    <div class="p-4 rounded-lg shadow-lg bg-sky-500 text-sm">Atención al usuario</div>
                                    <div class="p-4 rounded-lg shadow-lg bg-sky-500 text-sm">Consulta Externa</div>
                                    <div class="p-4 rounded-lg shadow-lg bg-sky-500 text-sm">CAD</div>
                                    <div class="p-4 rounded-lg shadow-lg bg-sky-500 text-sm">Hospitalización</div>
                                    <div class="p-4 rounded-lg shadow-lg bg-sky-500 text-sm">Servicio Famaceutico
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
