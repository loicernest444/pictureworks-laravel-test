<!DOCTYPE HTML>
<html>
<head>
    <title>404</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    @vite(['resources/sass/main.scss', 'resources/css/noscript.css', 'resources/js/app.js'])
</head>
<body class="is-preload">
<div id="wrapper">
    <section id="main">
        <h1>{{ $message }}</h1>
    </section>
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; Pictureworks</li>
        </ul>
    </footer>

</div>
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>
</body>
</html>