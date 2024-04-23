@include('layouts.head')

<nav x-data="{ open: false }" class="bg-white shadow-lg fadeInTop">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7" style="width: 7rem">
                <!-- Website Logo -->
                <a href="{{route('home')}}" class="flex items-center py-4 px-2">
                    <x-application-logo></x-application-logo>
                </a>
            </div>
            <!-- Secondary Navbar items -->
            <div class="hidden md:flex items-center space-x-3">
                <a
                    href="{{route('home')}}"
                    class="py-4 px-2 text-base font-regular primary-color"
                >Home</a
                >

                @auth()
                    <a
                        href="{{route('createRC')}}"
                        class="py-4 px-2 text-base font-regular primary-color"
                    >Share Dish</a
                    >
                @endauth()
                <a
                    href="{{route('contact.create')}}"
                    class="py-4 px-2 text-base font-regular primary-color"
                >Contact Us</a
                >
                @if(Route::has('login'))

                    @auth()
                        <div style="" class="sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        onclick="anvahien()"
                                        id="anvahienbtn"
                                        class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>


                                    <x-dropdown-link :href="route('recipes.myrecipe')">
                                        {{ __('Manage Recipe') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('favorite.index')">
                                        {{ __('Favorite') }}
                                    </x-dropdown-link>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>

                    @else
                        <a
                            id="nav-login-btn"
                            href="{{route('login')}}"
                            class="py-2 px-2 text-base font-regular primary-color"
                        >Log In</a
                        >
                        @if(Route::has('register'))
                            <a id="nav-signup-btn" href="{{route('register')}}">
                                <button
                                    class="primary-btn hover:bg-blue-700 text-white text-base font-regular py-2 px-4 rounded"
                                >
                                    Sign Up
                                </button>
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg
                        class="w-6 h-6 text-gray-500 primary-hover"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>


    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="">
            <li>
                @if(Route::has('home'))
                    <a
                        href="{{route('home')}}"
                        class="block text-sm px-2 py-4 primary-btn transition duration-300 text-base font-regular"
                    >Home</a
                    >
                @endif
            </li>
            <hr>

            <li>
                @if(Route::has('createRC'))
                    <a
                        href="{{route('createRC')}}" ;
                        class="block text-sm px-2 py-4 primary-btn transition duration-300 text-base font-regular" ;
                    >Share dish</a>
                @endif
            </li>
            <hr>
            <li>
                @if(Route::has('contact.create'))
                    <a
                        href="{{route('contact.create')}}"
                        class="block text-sm px-2 py-4 primary-btn transition duration-300 text-base font-regular"
                    >Contact</a
                    >
                @endif
            </li>
            <hr>
            @auth()

                <li>
                    @if(Route::has('profile.edit'))
                        <a
                            href="{{route('profile.edit')}}"
                            class="block text-sm px-2 py-4 primary-btn transition duration-300 text-base font-regular"
                        >Profile</a
                        >
                    @endif
                </li>
                <hr>

                <li>
                    @if(Route::has('recipes.myrecipe'))
                        <a
                            href="{{route('recipes.myrecipe')}}" ;
                            class="block text-sm px-2 py-4 primary-btn transition duration-300 text-base font-regular" ;
                        >My Recipe</a>
                    @endif
                </li>
                <hr>
                <li>
                    @if(Route::has('favorite.index'))
                        <a
                            href="{{route('favorite.index')}}" ;
                            class="block text-sm px-2 py-4 primary-btn transition duration-300 text-base font-regular" ;
                        >My Favorite</a>
                    @endif
                </li>
                <hr>

                <li>
                    @if(Route::has('logout'))
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                               onclick="event.preventDefault();
                                                this.closest('form').submit();"
                               class="primary-btn block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300 text-base font-regular">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @endif
                </li>
            @else

                <li id="nav-login-btn-mobile">
                    @if(Route::has('login'))
                        <a
                            href="{{route('login')}}"
                            class="block text-sm px-2 py-4 primary-btn transition duration-300 text-base font-regular"
                        >Login</a
                        >
                    @endif
                </li>
                <hr>
                <li id="nav-signup-btn-mobile">
                    @if(Route::has('register'))
                        <a
                            href="{{route('register')}}"
                            class="block text-sm px-2 py-4 primary-btn transition duration-300 text-base font-regular"
                        >Sign Up</a
                        >
                    @endif
                </li>

            @endauth
        </ul>
    </div>
    <script>
        const btn = document.getElementById("anvahienbtn");
        const menuanhien = document.getElementById("anvahien");
        btn.addEventListener("click", () => {
            menuanhien.classList.toggle("hidden");
        });


        const btnMobile = document.querySelector(
            "button.mobile-menu-button"
        );
        const menuMobile = document.querySelector(".mobile-menu");

        btnMobile.addEventListener("click", () => {
            menuMobile.classList.toggle("hidden");
        });
    </script>
</nav>

