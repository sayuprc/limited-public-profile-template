@extends('layout.app')

@section('content')
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">QRコード</h2>

            <div class="mx-auto max-w-lg rounded-lg border">
                <div class="flex flex-col gap-4 p-4 md:p-8">
                    <div><img alt="QR Code" class="mx-auto mb-4 h-48 w-48" src="{{ $data }}"></div>
                    <div>有効期限: {{ $expiredAt }}</div>

                    <a class="block rounded-lg bg-gray-800 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base"
                        href="{{ route('qr.edit.form') }}">編集</a>
                </div>
            </div>
        </div>
    </div>
@endsection
