<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Footer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>

<body>

    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="{{ route('dashboard') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('src/assets/logo.png') }}" class="h-8" alt="Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-black">FunFootball</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="{{ route('dashboard') }}" class="hover:underline mr-4 md:mr-6">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('list_lapangan') }}" class="hover:underline mr-4 md:mr-6">List Lapangan</a>
                    </li>
                    <li>
                        <a href="{{ route('field_place') }}" class="hover:underline mr-4 md:mr-6">Field</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:underline mr-4 md:mr-6">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                    href="https://www.linkedin.com/in/faisal-arrahman-pratama-280b15248?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                    class="hover:underline">Faisal Arrahman Pratama</a>. All Rights Reserved.</span>
        </div>
    </footer>

</body>

</html>
