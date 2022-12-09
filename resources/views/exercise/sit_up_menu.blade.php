<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('上体おこし') }}
      </h2>
    </div>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

            <div class="flex justify-center mb-4">
                        <img class="rounded-lg" src="{{ asset('images/sit_up_logo.png') }}" alt="上体起こし"height="120px" width="220px">
            </div>

            <div class="flex ml-4 pt-4 pb-4  border-t border-b justify-center">
            <img class="mr-2" src="{{ asset('images/sit_up1.PNG') }}" alt="上体起こし"height="120px" width="220px">
            <img src="{{ asset('images/sit_up2.PNG') }}" alt="上体起こし"height="120px" width="220px">

            <div class="flex flex-col">

                <div class="ml-8">
                    <h1 class="font-medium underline">やり方</h1>

                   <h2>あお向けになり、りょうひざをかるくまげます。</h2>
                   <h2>りょう手を頭の後ろでくみ、かたを少しもち上げます。</h2>
                   <h2>上体をできるだけ丸めこみます。</h2>
                   <h2>くび→かた→ひざのように体をまるめこむイメージです。</h2>
                </div>
            </div>
            </div>

            <div class="flex ml-4 mt-4 pt-12">
            <div>
                <a href="{{route('menu')}}">
              <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('もどる') }}</button>
            </div>
                </a>

            <div class="text-right ml-auto mr-4">

<form method="POST" action="{{ url('/sit_up') }}">
@csrf
<div class="flex">
    <div class="flex items-center mr-4">
        <input id="inline-radio" type="radio" value="5" name="count" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">5かい</label>
    </div>
    <div class="flex items-center mr-4">
        <input id="inline-2-radio" type="radio" value="10" name="count" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">10かい</label>
    </div>
    <div class="flex items-center mr-4">
        <input checked id="inline-checked-radio" type="radio" value="15" name="count" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">15かい</label>
    </div>
    <input type="hidden" name="exercise_name" value="上体起こし">

    <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('はじめる') }}</button>

    </div>
</div>
</form>


            </div>


        </div>
      </div>
    </div>
  </div>
</x-app-layout>
