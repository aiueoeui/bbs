<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Threads') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  Threads
                  @foreach ($records as $record)
                    <p>記録ID：{{ $record->id }}</p>
                    <p>UID：{{ $record->user_id }}</p>
                    <p>名前：{{ $record->name }}</p>
                    <p>回数：{{ $record->count }}</p>
                    <p>種目：{{ $record->exrcise_name }}</p>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</x-app-layout>