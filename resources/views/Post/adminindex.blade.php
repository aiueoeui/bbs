<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('記録一覧') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

<form>
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
    <div class="relative">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="search"  value="{{request('search')}}" placeholder="名前を入力">
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>



    <div class="overflow-x-auto relative mt-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">



            <tr>
                <th scope="col" class="py-3 px-6">名前</th>
                <th scope="col" class="py-3 px-6">運動名</th>
                <th scope="col" class="py-3 px-6">回数</th>
                <th scope="col" class="py-3 px-6">注意が出た回数</th>
                <th scope="col" class="py-3 px-6">実施日</th>
                <th scope="col" class="py-3 px-6"></th>
            </tr>

        </thead>

        <tbody>
        @if ($posts->count())
        @foreach ($posts as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="{{route('post.show',$post)}}">
                        {{$post->user->name}}
                    </a>
                </th>
                <td class="py-4 px-6">{{$post->exercise_name}}</td>
                <td class="py-4 px-6">{{$post->count}}</td>
                <td class="py-4 px-6">{{$post->badcount}}</td> 
                <td class="py-4 px-6">{{$post->created_at}}</td>
                <td><a href="{{route('post.show',$post)}}">
                    <button class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('詳細') }}</button>
                </a></td>

            </tr>
        @endforeach
        @else
            There is no thread.
        @endif
            </tbody>
        </table>
        <div class="flex justify-center mt-4">
                 {{ $posts->appends(request()->query())->links('vendor.pagination.tailwind2') }}
                 </div>
            </div>
        </div>




  </div>
</x-app-layout>
