<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel with react loader</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            height: 100vh
        }
        .welcome {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;>
        }
    </style>
</head>
<body>

    @react({
        "path": "components/Welcome",
        "loading": true,
        "class": "welcome",
        "props": {
            "name": "Laravel react loader"
        }
    })

    <script src="{{ asset('js/bundle.js') }}"></script>
</body>
</html>