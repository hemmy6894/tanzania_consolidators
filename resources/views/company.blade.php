<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanzania Consolidators</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <!-- component -->
    <style>
        :root {
            --main-color: #4a76a8;
        }

        .bg-main-color {
            background-color: var(--main-color);
        }

        .text-main-color {
            color: var(--main-color);
        }

        .border-main-color {
            border-color: var(--main-color);
        }
    </style>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



    <div class="bg-gray-100">
        <div class="w-full text-white bg-main-color">
            <div x-data="{ open: false }"
                class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="/">
                        <x-svg.home />
                    </a>  &nbsp;&nbsp;
                    <a href="#"
                        class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">Prime
                        Consolidator</a>
                </div>
            </div>
        </div>
        <!-- End of Navbar -->

        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
                                src="data:image/jpeg;base64,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"
                                alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">PRIME CONSOLIDATORS CO. LTD</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Country: Tanzania.</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">PRIME CONSOLIDATORS CO. LTD is a
                            privately owned Tanzanian service company specializing in International sea freight and air
                            freight Consolidation of Cargo. We enjoy an unrivalled reputation in the industry for high
                            quality and friendly service.</p>
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">Nov 07, 2016</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    {{-- <div class="bg-white p-3 hover:shadow">
                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <span class="text-green-500">
                                <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                            <span>Similar Profiles</span>
                        </div>
                        <div class="grid grid-cols-3">
                            <div class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                    alt="">
                                <a href="#" class="text-main-color">Kojstantin</a>
                            </div>
                            <div class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://avatars2.githubusercontent.com/u/24622175?s=60&amp;v=4"
                                    alt="">
                                <a href="#" class="text-main-color">James</a>
                            </div>
                            <div class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                    alt="">
                                <a href="#" class="text-main-color">Natie</a>
                            </div>
                            <div class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://bucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com/public/images/f04b52da-12f2-449f-b90c-5e4d5e2b1469_361x361.png"
                                    alt="">
                                <a href="#" class="text-main-color">Casey</a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End of friends card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Company Name</div>
                                    <div class="px-4 py-2">PRIME CONSOLIDATORS CO. LTD</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Current Address</div>
                                    <div class="px-4 py-2">Golden Jubilee Tower, Wing "A" 1st Floor, Ohio Street, DSM TZ
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Industry:</div>
                                    <div class="px-4 py-2">Consolidator</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">No of Employee</div>
                                    <div class="px-4 py-2">20 - 200</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                                    <div class="px-4 py-2">+255 123 24 789</div>
                                </div>
                                
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Founded At</div>
                                    <div class="px-4 py-2">Feb 06, 1998</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Website.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="http://primeconsolidators.com">primeconsolidators.com</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="mailto:prime@example.com">prime@example.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <button
                            class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                            Full Information</button> --}}
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    <!-- Experience and education -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div class="grid grid-cols-1">
                            <div>
                                <p>
                                    <b>PRIME CONSOLIDATORS CO. LTD</b> is a privately owned Tanzanian service company
                                    specializing
                                    in International sea freight and air freight Consolidation of Cargo. We enjoy an
                                    unrivalled reputation in the industry for high quality and friendly service.
                                    By understanding the requirements of each Customer, we pursue this objective in
                                    partnership with our Clients, through the teamwork of our staff and State of the Art
                                    Information Technology.
                                </p>
                                <br />
                                <p>
                                    <b>PRIME CONSOLIDATORS CO. LTD</b> is fully operational, having its headquarters in Dar es
                                    Salaam and looking forward to extending its branches around East Africa and Africa
                                    in
                                    general. It has established itself as a prominent consolidation company by providing
                                    quality services on Cargo Consolidation, Freight Forwarding, and Warehousing
                                    Services.
                                    Presently fully operational, Prime Consolidators Co. Ltd is a formal consolidator in
                                    Tanzania with a core competency in Ocean freight Consolidation. Prime Consolidators
                                    Co.
                                    Ltd seeks to become the preferred alternative for cargo forwarders, cargo movers and
                                    handlers, as well as shipping liners and similar carriers.
                                </p>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
