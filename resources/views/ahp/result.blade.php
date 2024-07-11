<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
    <header>
        @include('layouts.nav')
    </header>

    <main class="flex-grow p-4">
        {{-- <div class="bg-white p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-700 dark:border-gray-600 mb-6">
            <h2 class="text-xl font-bold mb-4">Konsistensi</h2>
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Nilai CR</th>
                        <th class="px-6 py-3">Konsisten / Tidak Konsisten</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-6 py-4">{{ $cr }}</td>
                        <td class="px-6 py-4">{{ $konsisten }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-white p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-700 dark:border-gray-600 mb-6">
            <h2 class="text-xl font-bold mb-4">Eigen Values</h2>
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Kriteria</th>
                        <th class="px-6 py-3">Eigen Value</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @foreach ($eigenValues as $kriteriaId => $eigenValue)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-6 py-4">{{ $kriteriaId }}</td>
                            <td class="px-6 py-4">{{ $eigenValue }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}

        <div class="bg-white p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-700 dark:border-gray-600 mb-6">
            <h2 class="text-xl font-bold mb-4">Perangkingan</h2>
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Lapangan</th>
                        <th class="px-6 py-3">Nilai Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @foreach ($total_utilities as $index => $total_utility)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $total_utility['alternatif'] }}</td>
                            <td class="px-6 py-4">{{ $total_utility['nilai_total'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-gray-800 p-4 text-white w-full">
        @include('layouts.footer')
    </footer>
</body>

</html>
