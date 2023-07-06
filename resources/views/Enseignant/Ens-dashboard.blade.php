<x-app-layout>
    <x-slot name="header">
    @section('goto')
    <a href="{{ route('mesInfos') }}">
    @endsection
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @section('navlinks')
                   <x-nav-link href="{{ route('mesInfos') }}" :active="request()->routeIs('mesInfos')">
                   <i class="fa-regular fa-id-card"></i>&nbsp;     {{ __('Mes Infos') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('mesclasses') }}" :active="request()->routeIs('mesclasses')">
                    <i class="fa-solid fa-users"></i>&nbsp;   {{ __('Mes Classes') }}
                    </x-nav-link>
                   
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