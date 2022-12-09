<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{Auth::user()->name}}{{ __('のきろく') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


    <div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

            <tr>
                <th scope="col" class="py-3 px-6">
                    @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                    {{ __('なまえ') }}
                    @else
                    {{ __('名前') }}
                    @endif
                </th>
                <th scope="col" class="py-3 px-6">
                    @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                    {{ __('うんどう') }}
                    @else
                    {{ __('運動名') }}
                    @endif
                </th>
                <th scope="col" class="py-3 px-6">
                    @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                    {{ __('かいすう') }}
                    @else
                    {{ __('回数') }}
                    @endif
                </th>
                <th scope="col" class="py-3 px-6">
                    @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                    {{ __('ちゅういされたかいすう') }}
                    @else
                    {{ __('注意が出た回数') }}
                    @endif
                </th>
                <th scope="col" class="py-3 px-6">
                    @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                    {{ __('やった日') }}
                    @else
                    {{ __('実施日') }}
                    @endif
                </th>
                <th scope="col" class="py-3 px-6"></th>
            </tr>

        </thead>

        <tbody>
        @if ($posts->count())
        @foreach ($posts as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <a href="{{route('post.show',$post)}}">{{$post->user->name}}
                </a>
                </th>
                <td class="py-4 px-6">{{$post->exercise_name}}</td>
                <td class="py-4 px-6">{{$post->count}}</td>
                <td class="py-4 px-6">{{$post->badcount}}</td> 
                <td class="py-4 px-6">{{$post->created_at}}</td>
                <td><a href="{{route('post.show',$post)}}">
                    <button class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                        @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                        {{ __('先生からのコメント') }}
                        @else
                        {{ __('先生からのコメント') }}
                        @endif
                    </button>
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
