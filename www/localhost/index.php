<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/node_modules/github-markdown-css/github-markdown.css">
    <link rel="stylesheet" type="text/css" href="/node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" type="text/css" href="/node_modules/highlightjs/styles/default.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <title>Dev Stack Dashboard</title>
</head>
<body class="markdown-body">
    <div class="wrapper dashboard">
        <h1>Dev Stack Dashboard</h1>
        <h2>Available hosts</h2>
        <ul class="hosts js-hosts clearfix">
            <li class="hidden js-host-example">
                <a class="js-href" href="http://phpmyadmin.localhost">
                    <span class="name">
                        <i class="fas fa-globe-americas"></i>
                        <span class="js-name">PHPMyAdmin</span>
                    </span>
                    <span class="url js-url">http://phpmyadmin.localhost</span>
                </a>
            </li>
        </ul>
        <div class="js-no-hosts hidden">
            <p>
                hosts.json was not found in <code>./www/localhost</code> or the file is empty. Use this format:
            </p>
            <pre><code class="lang-JSON">[
    {
        <span class="hljs-attr">"name"</span>: <span class="hljs-string">"My Site"</span>,
        <span class="hljs-attr">"url"</span>: <span class="hljs-string">"mysite.localhost"</span>
    }
]
</code></pre>
        </div>
        <h2>Info &amp; Tests</h2>
        <ul class="infos-tests clearfix">
            <li>
                <a href="http://localhost/infos/phpinfo.php">
                    <i class="fas fa-info-circle"></i>
                    PHP Info
                </a>
            </li>
            <li>
                <a href="http://localhost/tests/mysql.php">
                    <i class="fas fa-database"></i>
                    PHP PDO MySQL test
                </a>
            </li>
            <li>
                <a href="http://localhost/tests/mailer.php">
                    <i class="fas fa-database"></i>
                    PHP Mailer test
                </a>
            </li>
        </ul>
    </div>
    <div class="wrapper">
        <h1>README.md</h1>
        <div class="js-readme markdown-body"></div>
        <p class="js-no-readme hidden">No README.md was found</p>
    </div>
    
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/js/dashboard.js"></script>
</body>
</html>