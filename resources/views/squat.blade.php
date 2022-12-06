<!DOCTYPE html>
<html lang="jp">

<head>
    <style type="text/css">
        canvas {
            display: block;
            margin: auto;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/addons/p5.dom.min.js"></script>
    <!-- Require the peer dependencies of pose-detection. -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-core"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-converter"></script>

    <!-- You must explicitly require a TF.js backend if you're not using the TF.js union bundle. -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-backend-webgl"></script>
    <!-- Alternatively you can use the WASM backend: <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-backend-wasm/dist/tf-backend-wasm.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/pose-detection"></script>
    <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>

    <script>
        let conditions_count = @json($count);
    </script>

    <a id="downloadLink" download="myImage.png">Download</a>

    <script>
  // 5 秒ごとに処理を繰り返す
//   setInterval(function() {
//     // canvas 要素を取得
//     var canvas = document.getElementById('myCanvas');

//     // canvas 要素から画像データを取得
//     var data = canvas.toDataURL();

//     // XMLHttpRequest オブジェクトを作成
//     var xhr = new XMLHttpRequest();

//     // POST メソッドで送信するデータを準備
//     var formData = new FormData();
//     formData.append('image', data);

//     // リクエストを開始
//     xhr.open('POST', '/saveImage', true);
//     xhr.send(formData);
//     }, 5000);
//     </script>

    {{-- <script>
      // 5 秒ごとに処理を繰り返す
  setInterval(function() {
    // canvas 要素を取得
    var canvas = document.getElementById('defaultCanvas0');

    // canvas 要素から画像データを取得
    var data = canvas.toDataURL();

    // a 要素を取得
    var downloadLink = document.getElementById('downloadLink');

    // a 要素の href 属性に画像データを設定
    downloadLink.href = data;

    // a 要素をクリックする (画像のダウンロードを開始する)
    downloadLink.click();
  }, 5000);
    </script> --}}

    {{-- <script src="{{ asset('/js/squat.js') }}"></script> --}}

    {{-- <button>
        <a id="bt2">{{ $count }}</a>
    </button> --}}

    {{-- <script>
        $("#bt2").click(function () {
            $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        // Ajaxで値を送信
        $.ajax({
            url: 'post/create',
            type: 'POST',
            headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            dataType:"json",
            data: {
                value: 10,
            },
        })
        //通信が成功したとき
        .then((res) => {
        console.log(res);
        })
        //通信が失敗したとき
        .fail((error) => {
        console.log(error.statusText);
            });
    });

    //3秒後画面遷移
setTimeout(function () {
    if (conditions_count == 0) {
        location = '/post/create';
    }
}, 5000);
</script> --}}

    <script src="{{ asset('js/squat.js') }}"></script>


    <form method="POST" action="{{ route('post.create') }}">
    @csrf
    <input type="hidden" name="count" value="{{ $count }}">
    <input type="hidden" name="exercise_name" value="{{ $exercise_name }}">
    <button type="submit">Submit</button>
    </form>

</body>

</html>
