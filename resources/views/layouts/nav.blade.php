<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .nav-item {
            color: gray;
        }

        .nav-item.active {
            color: blue;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <nav class="bg-white dark:bg-gray-800 fixed w-full z-20 top-0 left-0 border-b-0">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('src/assets/logo.png') }}" class="h-10" alt="Flowbite Logo">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap text-black dark:text-white">FunFootball</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if (Auth::user())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Log Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Get Started
                        </button>
                    </a>
                @endif
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 bg-transparent"
                id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }} block py-2 px-3 rounded md:bg-transparent md:p-0 md:dark:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('list_lapangan') }}"
                            class="nav-item {{ Route::currentRouteName() == 'list_lapangan' ? 'active' : '' }} block py-2 px-3 rounded md:bg-transparent md:p-0 md:dark:text-white"
                            aria-current="page">List Lapangan</a>
                    </li>
                    <li class="relative group">
                        <a id="ahp" href="{{ route('field_place') }}"
                            class="nav-item {{ Route::currentRouteName() == 'field_place' ? 'active' : '' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 flex items-center">
                            Field
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <ul class="absolute hidden text-gray-700 pt-1 group-hover:block md:group-hover:flex md:flex-col md:bg-white md:dark:bg-gray-800 md:border md:border-gray-200 md:dark:border-gray-700 md:rounded md:shadow-lg"
                            id="dropdown-field">
                            <li>
                                <a id="kriteria"
                                    class="nav-item {{ Route::currentRouteName() == 'kriteria' ? 'active' : '' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 flex items-center"
                                    href="{{ route('kriteria') }}">
                                    Kriteria
                                </a>
                            </li>
                            <li>
                                <a class="nav-item {{ Route::currentRouteName() == 'perhitungan' ? 'active' : '' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 flex items-center"
                                    href="{{ route('perhitungan') }}">
                                    Perhitungan
                                </a>
                            </li>
                            <li>
                                <a class="nav-item {{ Route::currentRouteName() == 'result' ? 'active' : '' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 flex items-center"
                                    href="{{ route('result') }}">
                                    Result
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="nav-item {{ Route::currentRouteName() == 'contact' ? 'active' : '' }} block py-2 px-3 rounded md:bg-transparent md:p-0 md:dark:text-white"
                            aria-current="page">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        document.querySelector('[data-collapse-toggle]').addEventListener('click', function() {
            var navbar = document.getElementById('navbar-sticky');
            if (navbar.classList.contains('hidden')) {
                navbar.classList.remove('hidden');
            } else {
                navbar.classList.add('hidden');
            }
        });

        // Handle dropdown in mobile
        document.querySelectorAll('.relative.group > a').forEach(function(el) {
            el.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    event.preventDefault();
                    var dropdown = el.nextElementSibling;
                    if (dropdown.classList.contains('hidden')) {
                        dropdown.classList.remove('hidden');
                        el.parentElement.style.marginBottom = dropdown.offsetHeight + 'px';
                    } else {
                        dropdown.classList.add('hidden');
                        el.parentElement.style.marginBottom = '0';
                    }
                }
            });
        });

        document.querySelectorAll('.relative.group > ul > li > a').forEach(function(el) {
            el.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    var dropdown = el.closest('ul');
                    dropdown.classList.add('hidden');
                    dropdown.parentElement.style.marginBottom = '0';
                }
            });
        });
    </script>
</body>

</html>
