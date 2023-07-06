
<x-app-layout>

    <x-slot name="header">
    @section('goto')
    <a href="{{ route('home') }}">
    @endsection
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @section('navlinks')
                   <x-nav-link href="{{ route('élèves') }}" :active="request()->routeIs('élèves')">
                   <i class="fa-sharp fa-solid fa-graduation-cap"></i>&nbsp;   {{ __( 'Elèves') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('ens') }}" :active="request()->routeIs('ens')">
                    <i class="fa-solid fa-person-chalkboard"></i> &nbsp;  {{ __('Enseignants') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('classes') }}" :active="request()->routeIs('classes')">
                    <i class="fa-solid fa-users"></i>&nbsp;  {{ __('Classes') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('matieres') }}" :active="request()->routeIs('matieres')">
                    <i class="fa-solid fa-book"></i> &nbsp;  {{ __('matières') }}
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