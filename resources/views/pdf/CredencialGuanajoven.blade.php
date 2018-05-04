<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        #watermark {position: fixed; bottom: 0px; right: 0px; width: 100%; height: 1000px; text-align:center;}
        .text {font-size: 15px; font-weight: 600; z-index: 9999; position: relative; font-family: "Roboto", sans-serif}
        .big-text { font-size: 28px;}
        img{ border-radius:50% }
        
    </style>
    <title>Código ADMIC - {{ $nombre }}</title>
</head>

<body>
<div id="watermark"><img src="{{ url('img/credencial_background_new.png') }}"  height="100%"></div>
<p style="top: 560px; z-index: 9999;" class="text primary-color-text big-text" align="center"> {{ strtoupper($nombre) }} </p>
<p style="top: 565px; z-index: 9999;" class="text" align="center"> {{ $curp  }} </p>

<p style="z-index: 9999; position: relative; top: 575px; text-align:center;">
    <img src="data:image/png;base64, {!!base64_encode(QrCode::format('png')->size(140)->generate( $api_token )) !!}">
</p>

</body>

</html>
