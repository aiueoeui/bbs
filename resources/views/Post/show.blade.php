<x-app-layout>
  <x-slot name="header">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$post->name}}{{ __(' さんの ') }}{{$post->created_at}}
            @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
            {{ __('のきろく') }}
            @else
        {{ __(' の記録') }}
            @endif
      </h2>
    </div>

  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

        <!-- フラッシュメッセージ -->
        <script>
            @if (session('flash_message'))
                $(function () {
                        toastr.success('{{ session('flash_message') }}');
                });
            @endif
        </script>


    <div class="overflow-x-auto relative mt-4">
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
                    {{ __('やった日') }}
                    @else
                    {{ __('実施日') }}
                    @endif
                </th>
                <th scope="col" class="py-3 px-6">
                    @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                    {{ __('先生のスタンプ') }}
                    @else
                    {{ __('確認印') }}
                    @endif
                </th>
            </tr>

        </thead>

        <tbody>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">                        {{$post->user->name}}</th>
                <td class="py-4 px-6">{{$post->exercise_name}}</td>
                <td class="py-4 px-6">{{$post->count}}</td>
                <td class="py-4 px-6">{{$post->created_at}}</td>
                <td class="py-4 px-6">
                    @if ($post->check === 0)
                        {{ __('未確認') }}
                    @else
                        {{ __('〇') }}
                    @endif
            </tr>
            </tbody>
            {{-- <img src="{{ asset("storage/sample/Ygqa9aWlLloBW4nqOc80j9aaS2cnygKOXs4Ox8SA.jpg") }}"> --}}

        </table>

            <div class="px-8 py-12">
            <h3 class="border-b text-3xl font-bold">
            @if (Auth::User()->user_division == true)
            画像一覧 :
            @else
            うんどうのようす :
            @endif
            </h3>
            @if ($images->count())
            @foreach ($images as $image)
            <img class="mt-6 rounded-lg shadow-xl" src="{{ asset('storage/sample/' .$image->image) }}" width="25%" height="25%">
            @endforeach
            @else
            画像がアップロードされていません。
            @endif
            </div>

    <div class="flex ml-4 mt-4">
    <div class="mr-2">
        @if (Auth::User()->user_division == true)
            <a href="{{route('user.show',$post->user_id)}}">
        @else
            <a href="{{route('post.index')}}">
        @endif
            <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white" name="check" value="1">

            @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                {{ __('もどる') }}
            @else
                {{ __('戻る') }}
            @endif

            </button>
        </a>
    </div>

    @if (Auth::User()->user_division == true)
    <div class="text-right ml-auto mr-4">
                <form action="{{ route('post.update', $post->id) }}"  method="POST" id="new">
                    @csrf
                    @method('PUT')
                        @if ($post->check === 0)
                        <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white" name="check" value="1">{{ __('確認印') }}</button>
                        @else
                        <button type="submit" class="bg-gray-400 rounded font-medium px-4 py-2 text-white" name="check" value="0">{{ __('確認取り消し') }}</button>
                        @endif
                </form>
    </div>
    @endif
    </div>

            </div>
        </div>
        </div>

        {{-- コメント --}}
    <div class="py-12">

       <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


        @if ($comments->count())
        @foreach ($comments as $comment)
        <x-comment-card :comment="$comment" />
        @endforeach
        @else
            コメントはまだありません
        @endif

        @if (Auth::User()->user_division == true)
        <form action="{{ route('comments.store', $post) }}" method="post" class="m-4">
            @csrf
                <label for="body">{{ __('コメント') }}</label>
                <textarea name="body" id="body" cols="30" rows="4" class="w-full rounded-lg border-2 bg-gray-100 @error('comment') border-red-500 @enderror"></textarea>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('送信') }}</button>
            </div>
        </form>
        @endif
        </div>
       </div>
      </div>

</x-app-layout>
