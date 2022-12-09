
<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       {{$user->name}}{{ __(' さんの') }}{{ __('記録一覧') }}
      </h2>
    </div>
  </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


    <div class="overflow-x-auto relative">
        @csrf
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

            <tr>
                <th scope="col" class="py-3 px-6">名前</th>
                <th scope="col" class="py-3 px-6">運動名</th>
                <th scope="col" class="py-3 px-6">回数</th>
                <th scope="col" class="py-3 px-6">注意が出た回数</th>
                <th scope="col" class="py-3 px-6">実施日</th>
                <th scope="col" class="py-3 px-6">提出印</th>
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
                <td class="py-4 px-6 ">
                    @if ($post->check === 1)
                        <input id="check1" type="checkbox" name="checkbox[]" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ is_array(old("checkbox")) && in_array("選択肢1", old("checkbox"), true)? ' checked' : 'checked' }}>
                            <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="check1"></label>
                    @else
                        <input id="check1" type="checkbox" name="checkbox[]" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ is_array(old("checkbox")) && in_array("選択肢1", old("checkbox"), true)? ' checked' : '' }}>
                        <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="check1"></label>
                    @endif
                </td>
                <td><a href="{{route('post.show',$post)}}">
                    <button class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('詳細') }}</button>
                </a></td>

            </tr>

        @endforeach
        @else
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ __('記録はありません') }}
            </th>
        @endif
            </tbody>
        </table>
            </div>
        </div>

  </div>


</x-app-layout>

