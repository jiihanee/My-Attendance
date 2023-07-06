
<x-app-layout>

    <x-slot name="header">
    @section('goto')
    
    @endsection
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @section('navlinks')
                   
                    @endsection
          @yield('vue') 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @yield('content2')
            </div>
        </div>
    </div>
   
</x-app-layout>
