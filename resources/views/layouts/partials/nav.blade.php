<nav class="bg-indigo-400">
    <div class="flex flex-col justify-between bg-indigo-600 md:bg-transparent md:flex-row md:items-center" x-data="{navbar: false}">
        <div class="flex justify-between w-full px-4 py-4 md:w-auto md:border-b-0">
            <div class="">
                <a href="{{ route('home') }}" class="text-xl font-semibold text-white hover:text-indigo-900">{{ config('app.name') }}</a>
            </div>

            <div class="">
                <button class="block w-5 h-5 text-white md:hidden focus:outline-none" x-on:click="navbar = !navbar">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path x-show="!navbar" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                        <path x-show="navbar"  x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div :class="{'hidden': !navbar}" class="absolute justify-between hidden w-full leading-loose bg-indigo-400 md:visible md:border-t-0 md:relative mt-14 md:mt-0 md:flex">
            <div class="flex flex-col md:items-center md:flex-row">
                <a href="{{ route('timeline') }}" class="block px-4 font-medium text-white hover:text-gray-800 focus:outline-none md:py-3">Timeline</a>
                <a href="#" class="block px-4 font-medium text-white hover:text-gray-800 focus:outline-none md:py-3">Explore</a>
            </div>

            <div class="flex flex-col md:items-center md:flex-row">
                @auth
                    <div class="border-t border-white md:border-t-0" x-data="{dropdown: false}">
                        <div class="py-2 md:mr-4">
                            <button class="flex items-center px-4 focus:outline-none" x-on:click="dropdown = !dropdown">
                                <div class="flex-shrink-0">
                                    <img src="{{ auth()->user()->gravatar() }}" class="object-cover object-center w-10 h-10 rounded-full">
                                </div>
                                <div class="block px-2 text-white hover:text-gray-300">
                                    {{ auth()->user()->name }}
                                </div>
                            </button>
                        </div>
                        <div x-show="dropdown" class="top-0 right-0 w-full py-2 leading-relaxed bg-indigo-400 border-t border-white md:w-56 md:bg-indigo-300 md:mt-16 md:mr-4 md:rounded-lg md:shadow md:absolute" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"  stroke-linecap="round">
                            <a href="{{ route('account.profile', auth()->user()->usernameOrHash) }}" class="block px-4 text-white hover:text-gray-800 focus:outline-none">Profile</a>
                            <a href="#" class="block px-4 text-white hover:text-gray-800 focus:outline-none">Friends</a>
                            <a href="{{ route('setting.edit') }}" class="block px-4 text-white hover:text-gray-800 focus:outline-none">Settings</a>
                            
                            <div class="">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 font-medium text-white hover:text-gray-800 focus:outline-none">
                                    Log out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="block px-4 font-medium text-white hover:text-gray-800 focus:outline-none">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-4 font-medium text-white hover:text-gray-800 focus:outline-none md:py-4">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>