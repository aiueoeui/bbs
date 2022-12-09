
<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       {{ __('ユーザ一覧') }}
      </h2>
    </div>
  </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <?php
          $grade = [''];
          ?>


          <div class="flex">
            <div class="flex flex-col">
            <label for="countries" class="my-auto mr-2 text-sm font-medium text-gray-900 dark:text-white">学年</label>
            <select id="countries" name="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="">すべて</option>
            <option value="1">1年</option>
            <option value="2">2年</option>
            <option value="3">3年</option>
            <option value="4">4年</option>
            </select>
            </div>

            <div class="flex flex-col ml-4">
            <label for="countries" class="my-auto text-sm font-medium text-gray-900 dark:text-white">クラス</label>
            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a country</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
            </select>
            </div>

            <div class="flex flex-col ml-4">
            <label for="countries" class="my-auto text-sm font-medium text-gray-900 dark:text-white">出席番号</label>
            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a country</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
            </select>
            </div>

                <div class="flex flex-col ml-4 mt-auto mb-1">
                  <div class="text-right ml-auto mr-4 mt-4">
                    <button class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                    <input type="submit" value="検索">
                    </button>
                </div>
          </div>

        </div>
       </div>
      </div>
    </div>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


    <div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

            <tr>
                <th scope="col" class="py-3 px-6">ユーザID</th>
                <th scope="col" class="py-3 px-6">名前</th>
                <th scope="col" class="py-3 px-6">学年</th>
                <th scope="col" class="py-3 px-6">組</th>
                <th scope="col" class="py-3 px-6">出席番号</th>
                <th scope="col" class="py-3 px-6"></th>
            </tr>

        </thead>

        <tbody>
        @if ($users->count())
           @foreach($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               {{ $user->id }}
                </th>
                <td class="py-4 px-6">{{$user->name}}</td>
                <td class="py-4 px-6">{{$user->grade}}</td>
                <td class="py-4 px-6">{{$user->class}}</td>
                <td class="py-4 px-6">{{$user->number}}</td>
                <td><a href="{{route('user.show',$user)}}">
                    <button class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('記録一覧') }}</button>
                </a></td>
            </tr>

        @endforeach
        @else
            There is no thread.
        @endif
            </tbody>
        </table>
            </div>
        </div>

  </div>
</x-app-layout>

