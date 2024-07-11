<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        @media (max-width: 640px) {
            select {
                width: 100%;
                padding: 0.5rem;
                border: 1px solid #d1d5db;
                border-radius: 0.375rem;
                background-color: #fff;
                color: #374151;
                max-width: 100%;
            }
        }

        /* Ensuring the select dropdown doesn't overflow */
        select {
            max-width: 100%;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <header>
        <!-- Navbar -->
        @include('layouts.nav')
    </header>

    <main class="flex-grow container mx-auto p-4">
        <div class="max-w-md mx-auto mt-16 mb-4">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Perbandingan Matriks</h2>
        </div>

        <div class="relative overflow-x-auto bg-white border border-gray-200 rounded-lg shadow p-6">
            <form action="{{ route('store_matrik') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($kriteria as $kriteria_a)
                        @foreach ($kriteria as $kriteria_b)
                            @if ($kriteria_a->id < $kriteria_b->id)
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                                    <div class="mb-2">
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-4 ml-2">{{ $kriteria_a->name }}
                                            vs
                                            {{ $kriteria_b->name }}</label>
                                        <select
                                            class="form-control w-full px-3 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            name="nilai_{{ $kriteria_a->id }}_{{ $kriteria_b->id }}">
                                            <option value="1">{{ $kriteria_a->name }} Sama Penting dengan
                                                {{ $kriteria_b->name }} (Nilai = 1)</option>
                                            <option value="2">Nilai tengah diantara dua (Nilai = 2)</option>
                                            <option value="3">{{ $kriteria_a->name }} Sedikit Lebih Penting
                                                daripada
                                                {{ $kriteria_b->name }} (Nilai = 3)</option>
                                            <option value="4">Nilai tengah diantara dua (Nilai = 4)</option>
                                            <option value="5">{{ $kriteria_a->name }} Lebih Penting (Nilai = 5)
                                            </option>
                                            <option value="6">Nilai tengah diantara dua (Nilai = 6)</option>
                                            <option value="7">{{ $kriteria_a->name }} Sangat Penting (Nilai = 7)
                                            </option>
                                            <option value="8">Nilai tengah diantara dua (Nilai = 8)</option>
                                            <option value="9">{{ $kriteria_a->name }} Sangat Penting (Nilai = 9)
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            @elseif ($kriteria_a->id > $kriteria_b->id)
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                                    <div class="mb-2">
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-4 ml-2">{{ $kriteria_a->name }}
                                            vs {{ $kriteria_b->name }}</label>
                                        <input type="text"
                                            class="form-control w-full px-3 py-2 bg-gray-200 border border-gray-300 rounded-md focus:outline-none"
                                            value="1 / {{ old('nilai_' . $kriteria_b->id . '_' . $kriteria_a->id) }}"
                                            readonly>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-gray-800 p-4 text-white mt-8">
        <!-- Footer -->
        @include('layouts.footer')
    </footer>
</body>

</html>
