<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('スクワット') }}
      </h2>
    </div>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

            <div class="flex justify-center mb-4">
                        <img class="rounded-lg" src="../images/squat-logo.PNG" alt="スクワット"height="120px" width="220px">
            </div>

            <div class="flex ml-4 pt-4 pb-4  border-t border-b justify-center">
            <img class="mr-2" src="../images/squat2.PNG" alt="スクワット"height="120px" width="220px">
            <img src="../images/squat1.PNG" alt="スクワット"height="120px" width="220px">

            <div class="flex flex-col">


                <div class="ml-8">
                    <h1 class="font-medium underline">やり方</h1>

                   <h2>からだを横むきにしてから、行いましょう。</h2>
                   <h2>ひざをのばしましょう。</h2>
                   <h2>ひざを90°くらいになるまでまげましょう。</h2>
                   <h2>3びょうかんそのままのじょうたいをつづけましょう。</h2>
                   <h2>ゆっくり、体をもどしましょう。</h2>
                </div>


            </div>



            </div>



            <div class="flex ml-4 mt-4 pt-12">
            <div>
              <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('もどる') }}</button>
            </div>

            <div class="text-right ml-auto mr-4">
                <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('はじめる') }}</button>
            </div>


        </div>
      </div>
    </div>
  </div>
</x-app-layout>
