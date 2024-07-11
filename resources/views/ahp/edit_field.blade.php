<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <header>
        <!-- Navbar -->
        @include('layouts.nav')
    </header>

    <main class="bg-white p-6">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edit Lapangan
                    Bola
                </h2>
            </div>
            <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
                <form method="POST" action="{{ route('field_place.update', ['field_place' => $field_place]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')"
                            class="block text-sm font-medium leading-6 text-gray-900" />
                        <x-text-input id="name"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="text" name="name" value="{{ $field_place->name }}" required autofocus
                            autocomplete="name" />
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Harga')"
                            class="block text-sm font-medium leading-6 text-gray-900" />
                        <x-text-input id="price"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="text" name="price" value="{{ $field_place->price }}" required autofocus
                            autocomplete="price" />
                    </div>

                    <!-- Jenis Lapangan -->
                    <div class="mt-4">
                        <x-input-label for="jenis_lapangan" :value="__('Jenis Lapangan')"
                            class="block text-sm font-medium leading-6 text-gray-900" />
                        <x-text-input id="jenis_lapangan"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="text" name="jenis_lapangan" value="{{ $field_place->jenis_lapangan }}" required
                            autofocus autocomplete="jenis_lapangan" />
                    </div>

                    <!-- Fasilitas Lapangan -->
                    <div class="mt-4">
                        <x-input-label for="fasilitas_lapangan" :value="__('Fasilitas Lapangan')"
                            class="block text-sm font-medium leading-6 text-gray-900" />
                        <x-text-input id="fasilitas_lapangan"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="text" name="fasilitas_lapangan" value="{{ $field_place->fasilitas_lapangan }}"
                            required autofocus autocomplete="fasilitas_lapangan" />
                    </div>

                    <!-- Jumlah Pemain -->
                    <div class="mt-4">
                        <x-input-label for="jumlah_pemain" :value="__('Jumlah Pemain')"
                            class="block text-sm font-medium leading-6 text-gray-900" />
                        <x-text-input id="jumlah_pemain"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="text" name="jumlah_pemain" value="{{ $field_place->jumlah_pemain }}" required
                            autofocus autocomplete="jumlah_pemain" />
                    </div>

                    <!-- Telephone -->
                    <div class="mt-4">
                        <x-input-label for="telephone" :value="__('Telephone')"
                            class="block text-sm font-medium leading-6 text-gray-900" />
                        <x-text-input id="telephone"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="text" name="telephone" value="{{ $field_place->telephone }}" required autofocus
                            autocomplete="telephone" />
                    </div>
                    <div class="mt-6">
                        <x-primary-button
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
    </main>

    <footer class="bg-gray-800 p-4 text-white w-full">
        <!-- Footer -->
        @include('layouts.footer')
    </footer>
</body>

</html>
