<div class="px-4 mb-12 relative w-full md:w-4/12">
    <div
        class="shadow-lg rounded-lg relative flex flex-col min-w-0 break-words bg-white w-full mb-6 group transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:z-2">
        <div
            class="-mt-6 shadow-lg rounded-full mx-auto w-16 h-16 inline-flex justify-center items-center transition-all duration-300 ease-in-out transform group-hover:scale-75 bg-blueGray-500 text-white">
            <img src="{{ $company->logo_url }}" alt="" srcset="" class="w-16 h-16 rounded-full">
        </div>
        <div class="pt-8 pb-16 px-10 flex-auto relative overflow-hidden">
            <h4 class="text-2xl font-bold mt-0 mb-2">{{ $company->name }}</h4>
            <p class="text-blueGray-500 leading-relaxed">{{ substr($company->short_description, 0, 156) }} ...</p>
            <div
                class="grid grid-cols-2 text-blueGray-500 border-blueGray-200 opacity-50 rounded-b px-4 py-4 border-t absolute bottom-0 left-0 w-full text-center flex items-center justify-center transition-all duration-300 ease-in-out transform translate-y-0 group-hover:translate-y-0 group-hover:opacity-100">
                <div><a href="{{ route('company', ['company' => $company->slag]) }}">Read more</a></div>
                @if ($company->website)
                    <div><a href="http://{{ $company->website }}" target="_blank">Go To Site</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
