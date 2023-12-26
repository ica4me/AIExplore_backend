<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .splash-screen {
            background-color: #f2f2f2;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            flex-direction: column;
        }

        .splash-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: inline-block;
            margin-bottom: 20px;
            cursor: pointer;
            background-size: cover;
        }

        .splash-text {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="splash-screen">
        <div class="splash-content">
            <!-- Inline style untuk background-image -->
            <div class="splash-logo" onclick="changeColor()" style="background-image: url('{{ asset('img/aiexplore.png') }}');"></div>
            <div class="splash-text">AIExplore</div>
        </div>
    </div>

<script>
    var colors = ['#4CAF50', '#ff5722', '#2196F3', '#9C27B0', '#E91E63'];
    var currentColorIndex = 0;

    function changeColor() {
        currentColorIndex = (currentColorIndex + 1) % colors.length;
        document.querySelector('.splash-logo').style.backgroundColor = colors[currentColorIndex];
    }

    setInterval(changeColor, 1000);

    setTimeout(function() {
        window.location.href = '/aiexplore/public/dashboard';
    }, 2000);
</script>

</body>
</html>
