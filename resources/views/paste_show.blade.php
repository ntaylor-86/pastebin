@extends('layouts.app')

@section('content')

@if (!is_null($pasteBin->expires))
    <div class="mt-12">
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <svg class="w-5 h-5 inline mr-1" style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
            </svg>
            This document will expire in {{ $pasteBin->expires->diffForHumans() }}.
        </div>
    </div>
@endif


<div class="{{ (!is_null($pasteBin->expires)) ? 'mt-8' : 'mt-12' }}">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="text-sm text-gray-500">
                <p class="">
                    <strong>{{ $pasteBin->title ?? 'No Title' }}</strong> posted {{ $pasteBin->created_at->diffForHumans() }}
                    by <strong>{{ $pasteBin->postedBy ?? 'Anonymous' }}</strong>.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="mt-8">
    <pre class="rounded bg-gray-200 border border-gray-300 p-5" style="font-size: 13px; white-space: pre-wrap; word-break: normal;">{{ $pasteBin->paste }}</pre>
</div>

@endsection


