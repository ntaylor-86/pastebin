@extends('layouts.app')

@section('content')
<div class="mt-16">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <form action="{{ route('submit-pastebin') }}" method="POST">
        @csrf
        
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <label for="paste" class="block text-sm font-semibold text-gray-700">
                        New Paste
                    </label>
                    <div class="mt-3">
                        <textarea 
                            id="paste" 
                            name="paste" 
                            rows="15" 
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                            style="font-family: monospace; resize: vertical;"
                            autofocus
                        ></textarea>
                    </div>
                </div>

                <div class="col-span-3">
                    <label for="pasted_by" class="block text-sm font-semibold text-gray-700">
                        Posted By
                    </label>
                    <input 
                        type="text" 
                        name="posted_by" 
                        id="posted_by" 
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        placeholder="Anonymous"
                    >
                </div>
                
                <div class="col-span-3">
                    <label for="title" class="block text-sm font-semibold text-gray-700">
                        Poste Title
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    >
                </div>

                <div class="col-span-3">
                    <label for="pasted_by" class="block text-sm font-semibold text-gray-700">
                        Expires
                    </label>
                    <select name="expires" id="expires" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="5">5 minutes</option>
                        <option value="10">10 minutes</option>
                        <option value="60">1 hour</option>
                        <option value="1440">1 day</option>
                        <option value="never" selected>Never</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create New Paste
            </button>
        </div>

        </form>
    </div>
</div>
@endsection


