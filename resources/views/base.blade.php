<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NasExplorer  - @yield('titre')</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/js/axios.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
  </head>
  <body>
    <div id="appMessage" class="appMessage"></div>
    <div class="container-fluid">
      @yield("contenu")
    </div>
  </body>
</html>
