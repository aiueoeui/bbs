<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                {{ __('かくにんがめん') }}
            @else
                {{ __('確認画面') }}
            @endif
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <label for="exercise_name" class="font-semibold leading-none">

            @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
            {{ __('このないようでけっていするよ') }}
            @else
            {{ __('以下の内容で登録します') }}
            @endif
        　</label>
          <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full flex flex-col">
            @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
              <label for="exercise_name" class="font-semibold leading-none mt-4">
                {{ __('やったうんどう') }}
            </label>
                @else
              <label for="exercise_name" class="font-semibold leading-none mt-4">
                {{ __('運動種目') }}
            </label>
            @endif
                <input type = "hidden" name="exercise_name" id="exercise_name" value="{{$exercise_name}}" readonly>

                <h2 class="ml-2 mt-2 font-bold text-2xl">
                  {{$exercise_name}}
                </h2>
             </div>

              <!-- @error('title')
              <div class="text-red-500 text-sm mt-2">
                {{ $message }}
              </div>
              @enderror
            </div> -->

            <div class="w-full flex flex-col">
              <label for="count" class="font-semibold leading-none mt-4">
                @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                    {{ __('かいすう') }}
                @else
                    {{ __('回数') }}
                @endif
            </label>
            <input type="hidden" name="count" id="count" value="{{$count}}" readonly>
                <h2 class=" text-2xl ml-2 mt-2 font-bold">
                  {{$count}}{{ __(' かい') }}
                </h2>
            </div>

            <div class="w-full flex flex-col">
              <label for="badcount" class="font-semibold leading-none mt-4">
                  @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                    {{ __('ちゅういされたかいすう') }}
                @else
                  {{ __('注意が出た回数') }}
                @endif
              </label>
              <textarea name="badcount" id="badcount" cols="30" rows="2" class="w-full rounded-lg border-2 bg-gray-100 mb-4 @error('title') border-red-500 @enderror">{{$badcount}}</textarea>
            </div>


              <label for="image" class="font-semibold leading-none mt-4">
            @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                {{ __('がぞう') }}
            @else
                {{ __('画像') }}
            @endif
              </label>

        <div class="flex">

              <label>
               <input id="image" type="file" name="image" accept=".png, .jpg, .jpeg, .pdf, .doc" multiple>
            </label>

            <div class="text-right ml-auto mr-4 mt-4">
              <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
            @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
                {{ __('けってい') }}
            @else
                {{ __('登録') }}
            @endif
            </button>
            </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
