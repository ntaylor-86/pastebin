@extends('layouts.app')

@section('content')
<div class="mt-16">
    <div class="container mx-auto h-screen">
        <div class="text-center px-3 lg:px-0">
            
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle w-36 h-36 text-green-200 mx-auto" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                </svg>
            </div>
            
            <h1 class="my-4 text-4xl leading-tight text-gray-600">
                Success!
            </h1>

            <p class="mt-5 text-gray-500 text-xl">
                Your paste has been saved, 
            </p>
            <p class="mt-4 text-xl text-blue-600">
                <a href="{{ route('paste.show', ['uuid' => $pasteBin->uuid]) }}" class="hover:underline">
                    {{ route('paste.show', ['uuid' => $pasteBin->uuid]) }}
                </a>
            </p>
            <p class="mt-4">
                <button 
                    id="copyLinkButton" 
                    onclick="copyToClipBoard('{{ route('paste.show', ['uuid' => $pasteBin->uuid]) }}')"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard mr-2" viewBox="0 0 16 16">
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                      </svg>
                    Copy to clipboard
                </button>
            </p>
        </div>
    </div>
</div>

<script>
    function copyToClipBoard(inputText) {
        var textArea = document.createElement('textarea');
        textArea.value = inputText;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('Copy');
        textArea.remove();
    }
</script>
@endsection