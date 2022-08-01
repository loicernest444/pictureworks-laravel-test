<!DOCTYPE HTML>
<html>
<head>
    <title>Update User</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    @vite(['resources/css/main.css', 'resources/css/noscript.css', 'resources/js/app.js'])
</head>
<body class="is-preload">
<div id="wrapper">
    <section id="main">
        <header>
            <h1>Update User Comments</h1>
        </header>
        <main>
            <form action="/api/update-user" method="POST">
                <div class="fields">
                    <label class="" for="id">User ID</label>
                    <input class="" type="text" name="id" id="id" required>
                </div>

                <div class="fields">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="fields">
                    <label for="comments">Comments</label>
                    <textarea name="comments" id="comments" cols="30" rows="10" required></textarea>
                </div>
                <div class="fields">
                    <button class="button" type="submit">Save</button>
                </div>
            </form>
        </main>
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