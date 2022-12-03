<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ホーム') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>{{Auth::user()->name}}さん、こんにちは！</h1>

                    @if (Auth::User()->user_division == true)
                    <h2 class="border-b">
                    あなたは教員権限を持っています
                    </h2>

                <div class="flex justify-center mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a class="px-4" href="">
                            記録一覧
                        </a>
                    </button>
                </div>

                <div class="flex justify-center mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        児童情報確認
                    </button>
                </div>

                    @else
                    <h1>あなたは{{Auth::user()->grade}}年{{Auth::user()->class}}組出席番号{{Auth::user()->number}}です</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
