<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <header>
        <!-- Navbar -->
        @include('layouts.nav')
    </header>

    <main class="bg-white p-6 flex-grow">
        <section id="hero_landing_page">
            <div class="flex flex-col lg:flex-row items-center w-full">
                <div class="flex-shrink-0 mt-6 lg:mt-0 lg:ml-6 order-first lg:order-last">
                    <img src="{{ asset('src/assets/field.png') }}" alt="Illustration"
                        class="w-full h-auto lg:w-128 lg:h-128 object-contain">
                </div>
                <div class="flex-1 h-screen flex items-center justify-center lg:mr-24">
                    <div class="text-center lg:text-left">
                        <h1 class="text-4xl font-bold text-blue-600 mb-4">FunFootball</h1>
                        <p class="text-gray-700 dark:text-gray-400 mb-4">
                            FunFootball hadir untuk memudahkan para pecinta sepakbola dalam mencari lapangan yang ideal.
                            Kami menyediakan informasi lengkap tentang lapangan, fasilitas, dan harga, sehingga Anda
                            bisa fokus menikmati permainan.
                        </p>
                        <a href="{{ route('perhitungan') }}"
                            class="inline-flex items-center px-5 py-3 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Mulai
                            <svg class="rtl:rotate-180 w-4 h-4 ml-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 p-4 text-white w-full">
        <!-- Footer -->
        @include('layouts.footer')
    </footer>
</body>

</html>
