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

</head>

<body>

    <script src="{{ asset('/js/squat.js') }}"></script>

</body>

</html>
