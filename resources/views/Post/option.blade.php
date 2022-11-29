<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('運動設定') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <label for="exercise_name" class="font-semibold leading-none">{{ __('以下の内容で実行します') }}</label>
          <div>{{ $exercise_name = 'test' }}</div>
          <form action="{{ route('post.option') }}" method="post"
          enctype="multipart/form-data">
            @csrf
            <div class="w-full flex flex-col">
              <label for="exercise_name" class="font-semibold leading-none mt-4">{{ __('運動種目') }}</label>
              <textarea name="exercise_name" id="exercise_name" cols="30" rows="2" class="w-full rounded-lg border-2 bg-gray-100 @error('exercise_name') border-red-500 @enderror">{{$exercise_name}}</textarea>
             </div>

              <!-- @error('title')
              <div class="text-red-500 text-sm mt-2">
                {{ $message }}
              </div>
              @enderror
            </div> -->

            <div class="w-full flex flex-col">
              <label for="count" class="font-semibold leading-none mt-4">{{ __('回数') }}</label>
              <textarea name="count" id="count" cols="30" rows="2" class="w-full rounded-lg border-2 bg-gray-100 @error('title') border-red-500 @enderror">{{$count}}</textarea>
            </div>

            <div class="w-full flex flex-col">
              <label for="image" class="font-semibold leading-none mt-4">画像</label>
              <div>
              <input id="image" type="file" name="image">
             </div>
            </div>

            <div class="mt-4">
              <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('登録') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
