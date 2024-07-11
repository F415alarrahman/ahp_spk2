<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kreteria</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen">
    <header>
        <!-- Navbar -->
        @include('layouts.nav')
    </header>

    <main class="flex-grow">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-24">
            <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Kriteria
            </h2>
        </div>
        <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Kriteria
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria as $item_kriteria)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item_kriteria->name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer class="bg-gray-800 p-4 text-white w-full">
        <!-- Footer -->
        @include('layouts.footer')
    </footer>
</body>

</html>
