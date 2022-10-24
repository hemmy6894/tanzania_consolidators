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
    <header>
        <div class="relative overflow-hidden bg-no-repeat bg-cover"
            style="
              background-position: 50%;
              background-image: url('/dar.jpg');
              height: 420px;
            ">
            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.75)">
                <div class="flex justify-center items-center h-full">
                    <div class="text-center text-white px-6 md:px-12">
                        <h1 class="text-5xl font-bold mt-0 mb-6">Tanzania Consolidators</h1>
                        {{-- <h3 class="text-3xl font-bold mb-8">Tanzania Consolidators</h3> --}}
                        {{-- <button type="button"
                            class="inline-block px-6 py-2.5 border-2 border-white text-white font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                            data-mdb-ripple="true" data-mdb-ripple-color="light">
                            Get started
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <div class="w-full">
        <div class="py-12 bg-gray-800 project-2">
            <div class="container mx-auto px-4">
                <div class="mb-12">
                    <div class="mb-12 flex flex-wrap -mx-4 justify-center">
                        <div class="px-4 relative w-full lg:w-8/12 text-center">
                            <h6 class="mb-2 text-lg font-bold uppercase text-teal-500">Have you seen us?</h6>
                            <h2 class="text-4xl font-bold mt-0 mb-1 text-white">Some of Tanzania Consolidators
                            </h2>
                        </div>
                    </div>
                </div>
                {{-- <div class="mb-10">
                    <form>
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Company ..." required>
                            <button type="submit"
                                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                </div> --}}
                <div class="flex flex-wrap -mx-4">
                    @foreach ($companies as $item)
                        <x-company.card :company="$item"/>
                    @endforeach
                </div>

                <div class="mt-5">
                    <nav aria-label="Page navigation example">
                        {{ $companies->appends($_GET)->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="w-full pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-blueGray-100 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="relative bg-blueGray-100 pt-8 pb-6">
            <div class="container mx-auto px-4">
                {{-- <div class="flex flex-wrap text-center lg:text-left">
                    <div class="w-full lg:w-6/12 px-4">
                        <h4 class="text-xl mt-4 font-bold">Let's keep in touch!</h4>
                        <h5 class="mt-1 mb-2 text-blueGray-500">Find us on any of these platforms, we
                            respond
                            1-2 business days.</h5>
                        <div class="mt-6 lg:mb-0 mb-6"><a href="https://twitter.com/CreativeTim/" target="_blank"
                                class="bg-white text-twitter-regular shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex"
                                type="button"><i class="fab fa-twitter"></i></a><a
                                href="https://www.facebook.com/CreativeTim/" target="_blank"
                                class="bg-white text-facebook-regular shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex"
                                type="button"><i class="fab fa-facebook"></i></a><a
                                href="https://dribbble.com/creativetim" target="_blank"
                                class="bg-white text-dribbble-regular shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex"
                                type="button"><i class="fab fa-dribbble"></i></a><a
                                href="https://github.com/creativetimofficial" target="_blank"
                                class="bg-white text-github-regular shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex"
                                type="button"><i class="fab fa-github"></i></a></div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="flex flex-wrap items-top mb-6">
                            <div class="w-full lg:w-4/12 px-4 ml-auto"><span
                                    class="block uppercase text-xs font-bold mb-2">Useful Links</span>
                                <ul class="list-unstyled"><a
                                        href="https://www.creative-tim.com/presentation?npr-landing-1" target="_blank"
                                        class="text-blueGray-500 hover:text-blueGray-700 block pb-2 text-sm">About
                                        Us</a><a href="https://www.creative-tim.com/blog?npr-landing-1" target="_blank"
                                        class="text-blueGray-500 hover:text-blueGray-700 block pb-2 text-sm">Blog</a><a
                                        href="https://github.com/creativetimofficial" target="_blank"
                                        class="text-blueGray-500 hover:text-blueGray-700 block pb-2 text-sm">Github</a><a
                                        href="https://www.creative-tim.com/templates/free?npr-landing-1" target="_blank"
                                        class="text-blueGray-500 hover:text-blueGray-700 block pb-2 text-sm">Free
                                        Products</a></ul>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 ml-auto"><span
                                    class="block uppercase text-xs font-bold mb-2">Other Resources</span>
                                <ul class="list-unstyled"><a href="https://www.creative-tim.com/license?npr-landing-1"
                                        target="_blank"
                                        class="text-blueGray-500 hover:text-blueGray-700 block pb-2 text-sm">License</a><a
                                        href="https://www.creative-tim.com/terms?npr-landing-1" target="_blank"
                                        class="text-blueGray-500 hover:text-blueGray-700 block pb-2 text-sm">Terms
                                        &amp; Conditions</a><a href="https://www.creative-tim.com/privacy?npr-landing-1"
                                        target="_blank"
                                        class="text-blueGray-500 hover:text-blueGray-700 block pb-2 text-sm">Privacy
                                        Policy</a><a href="https://www.creative-tim.com/contact-us?npr-landing-1"
                                        target="_blank"
                                        class="text-blueGray-500 hover:text-blueGray-700 block pb-2 text-sm">Contact
                                        Us</a></ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <hr class="my-6 border-blueGray-200">
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                        <div class="text-sm text-blueGray-500 py-1">Copyright © 2022 <a href="https://mojabora.com">Mojabora</a>  by
                            Creative Time.</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
