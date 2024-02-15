@extends('layout.app')

@section('content')
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="mb-6 flex items-end justify-between gap-4">
                <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">QRコード一覧</h2>
            </div>

            <div class="grid gap-x-4 gap-y-6 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($qrs as $qr)
                    <div class="flex flex-col">
                        <span class="text-gray-500">有効期限: {{ $qr->expiredAt() }}</span>
                        <span class="text-gray-500">作成日時: {{ $qr->createdAt() }}</span>
                        <a class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl"
                            href="{{ route('qr.show', ['qr_code_id' => $qr->qrCodeId]) }}">詳細</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
