<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
        {{ __('うんどうしゅう') }}
        @else
        {{ __('運動一覧') }}
        @endif
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

        <div class="w-full flex flex-col">
            <div class="mt4">

</div>
@if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
        <div class="flex justify-center"><img src="images/1-2selection.PNG" alt="記録する運動を選んでください" height="240px" width="440px"></div>
        @else
        <div class="flex justify-center"><img src="images/3-6selection.PNG" alt="記録する運動を選んでください" height="240px" width="440px"></div>
@endif

    @if ((Auth::User()->grade == '1')||(Auth::User()->grade == '2'))
     <div class="flex justify-center mt-4">
        <div class="flex flex-row">

            <a class="pr-1" href="{{ route('exercise.squat_menu')}}"><img src="images/sukuwatto.PNG" alt="スクワット"height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.step_up_menu')}}"><img src="images/3-6ashihumi.PNG" alt="その場足踏み" height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.dumbbell_menu')}}"><img src="images/3-6chikara.PNG" alt="ちからこぶ運動" height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.push_up_menu')}}"><img src="images/1-2udetate.PNG" alt="うでたてふせ" height="120px" width="220px"></a>

        </div>
        </div>
    </div>

        <div class="flex justify-center mt-2">
        <div class="flex flex-row">
            <a class="pr-1" href="{{ route('exercise.karadanoyoko_menu')}}"><img src="images/karadanoyoko.PNG" alt="からだのよこ" height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.kataashi_menu')}}"><img src="images/kataashi.PNG" alt="かたあしあげ" height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.kubi_menu')}}"><img src="images/kubi.PNG" alt="くび" height="120px" width="220px"></a>
        </div>

        </div>
        @else
     <div class="flex justify-center mt-4">
        <div class="flex flex-row">

            <a class="pr-1" href="{{ route('exercise.squat_menu')}}"><img src="images/sukuwatto.PNG" alt="スクワット"height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.step_up_menu')}}"><img src="images/3-6ashihumi.PNG" alt="その場足踏み" height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.dumbbell_menu')}}"><img src="images/3-6chikara.PNG" alt="ちからこぶ運動" height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.push_up_menu')}}"><img src="images/1-2udetate.PNG" alt="うでたてふせ" height="120px" width="220px"></a>


        </div>
        </div>
    </div>

        <div class="flex justify-center mt-2">
        <div class="flex flex-row">
            <a class="pr-1" href="{{ route('exercise.karadanoyoko_menu')}}"><img src="images/karadanoyoko.PNG" alt="からだのよこ" height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.kataashi_menu')}}"><img src="images/kataashi.PNG" alt="かたあしあげ" height="120px" width="220px"></a>

            <a class="pr-1" href="{{ route('exercise.kubi_menu')}}"><img src="images/kubi.PNG" alt="くび" height="120px" width="220px"></a>

        </div>
        </div>
        @endif

  </div>
</x-app-layout>





