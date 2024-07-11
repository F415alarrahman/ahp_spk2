<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <header>
        <!-- Navbar -->
        @include('layouts.nav')
    </header>

    <main class="flex-grow bg-white p-6">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Tambah Lapangan
                    Bola</h2>
            </div>
            <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-md">
                <form method="POST" action="{{ route('field_place.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <!-- Name -->
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <input id="name" name="name" type="text" required autofocus autocomplete="name"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Harga</label>
                        <input id="price" name="price" type="text" required autocomplete="price"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>

                    <!-- Jarak -->
                    <div class="mt-4">
                        <label for="jarak" class="block text-sm font-medium leading-6 text-gray-900">Jarak</label>
                        <input id="jarak" name="jarak" type="text" required autocomplete="jarak"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>

                    <!-- Jenis Lapangan -->
                    <div class="mt-4">
                        <label for="jenis_lapangan" class="block text-sm font-medium leading-6 text-gray-900">Jenis
                            Lapangan</label>
                        <input id="jenis_lapangan" name="jenis_lapangan" type="text" required
                            autocomplete="jenis_lapangan"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>

                    <!-- Fasilitas Lapangan -->
                    <div class="mt-4">
                        <label for="fasilitas_lapangan"
                            class="block text-sm font-medium leading-6 text-gray-900">Fasilitas Lapangan</label>
                        <input id="fasilitas_lapangan" name="fasilitas_lapangan" type="text" required
                            autocomplete="fasilitas_lapangan"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>

                    <!-- Jumlah Pemain -->
                    <div class="mt-4">
                        <label for="jumlah_pemain" class="block text-sm font-medium leading-6 text-gray-900">Jumlah
                            Pemain</label>
                        <input id="jumlah_pemain" name="jumlah_pemain" type="text" required
                            autocomplete="jumlah_pemain"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>

                    <!-- Telephone -->
                    <div class="mt-4">
                        <label for="telephone"
                            class="block text-sm font-medium leading-6 text-gray-900">Telephone</label>
                        <input id="telephone" name="telephone" type="text" required autocomplete="telephone"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 p-4 text-white w-full">
        <!-- Footer -->
        @include('layouts.footer')
    </footer>
</body>

</html>
