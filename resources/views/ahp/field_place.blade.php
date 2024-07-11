<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Field Place</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">
    <script defer src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>
    <style>
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        main {
            padding-top: 60px;
            margin-top: 2rem;
        }

        /* Adjusting table text color */
        table.dataTable {
            color: #374151;
            /* Text color for normal state */
        }

        table.dataTable thead th {
            color: #4b5563;
            /* Text color for table header */
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <header>
        <!-- Navbar -->
        @include('layouts.nav')
    </header>

    <main class="flex-grow container mx-auto mt-8">
        <a href="{{ route('tambah_field') }}">
            <button
                class="ml-8 mb-4 inline-flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                {{ __('Tambah Data') }}
            </button>
        </a>
        <div
            class="relative overflow-x-auto sm:rounded-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-600 dark:border-gray-500 dark:hover:bg-gray-500">
            <table id="example" class="w-full text-sm text-left rtl:text-right text-gray-300 dark:text-gray-400">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Lapangan</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3">Jarak</th>
                        <th scope="col" class="px-6 py-3">Jenis Lapangan</th>
                        <th scope="col" class="px-6 py-3">Fasilitas Lapangan</th>
                        <th scope="col" class="px-6 py-3">Jumlah Pemain</th>
                        <th scope="col" class="px-6 py-3">Telephone</th>
                        <th scope="col" class="px-6 py-3">CRUD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post_lapangan as $item)
                        <tr class="text-center">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $item->name }}</td>
                            <td class="px-6 py-4">{{ $item->price }}</td>
                            <td class="px-6 py-4">{{ $item->jarak }}</td>
                            <td class="px-6 py-4">{{ $item->jenis_lapangan }}</td>
                            <td class="px-6 py-4">{{ $item->fasilitas_lapangan }}</td>
                            <td class="px-6 py-4">{{ $item->jumlah_pemain }}</td>
                            <td class="px-6 py-4">{{ $item->telephone }}</td>
                            <td class="px-6 py-4 flex justify-center items-center gap-3">
                                <a href="{{ route('field_place.edit', $item->id) }}"
                                    class="px-3 py-2 text-white font-semibold bg-blue-500 rounded-lg">Edit</a>
                                <form action="{{ route('field_place.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-2 text-white font-semibold bg-rose-500 rounded-lg">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-gray-800 p-4 text-white w-full mt-auto">
        <!-- Footer -->
        @include('layouts.footer')
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            const table = $("#example").DataTable({
                language: {
                    search: "Cari data:",
                    searchPlaceholder: "Cari data lapangan...",
                },
                lengthMenu: [
                    [5, 10, -1],
                    [5, 10, "All"],
                ],
            });
        })
    </script>
</body>

</html>
