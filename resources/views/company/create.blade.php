<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 p-3">
                        <div><input type="text" name="name" placeholder="Name" class="border p-2 w-full"></div>
                        <div><input type="text" name="industry" placeholder="industry" class="border p-2 w-full"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 p-3">
                        <div><input type="text" name="contact_phone" placeholder="Contact Phone" class="border p-2 w-full"></div>
                        <div><input type="text" name="contact_email" placeholder="Contact Email" class="border p-2 w-full"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 p-3">
                        <div><input type="text" name="website" placeholder="Website" class="border p-2 w-full"></div>
                        <div><input type="text" name="address" placeholder="Address" class="border p-2 w-full"></div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 p-3">
                        <div><input type="text" name="country" placeholder="Country" class="border p-2 w-full"></div>
                        <div><input type="file" name="plogo" placeholder="logo" class="border p-2 w-full"></div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 p-3">
                        <div><textarea type="text" name="short_description" placeholder="Short Description" class="border p-2 w-full"></textarea></div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 p-3">
                        <button class="btn btn-blue">Create</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
