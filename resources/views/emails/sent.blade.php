<html>
<head>

    <style>
        .text-center{
            text-align: center;
        }
        *{
            font-family: "Simplified Arabic";
            font-size: 18px;;
        }
    </style>
</head>
<body class="text-center" style="padding: 50px 40px 40px 50px; border: 1px rgba(0,0,0,0.12) solid;background-color:  #ffffff;">
<div style="padding: 2px; border: 1px #f5f5f5 solid;background-color:  #e7ecf1;">
    <h2 style="color: #0a6aa1; text-align: left;">Dear\ {{$contactMessage->name }}</h2>
    <p>{!! $replay !!}</p>
</div>

</body>
</html>

