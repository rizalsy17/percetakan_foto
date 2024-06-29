<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- @routes <!-- Ini akan menambahkan Ziggy routes --> --}}
    @vite(['resources/css/app.css', 'resources/css/tailwind.output.css'])
    @inertiaHead
  </head>
  <body>
    @inertia
    @vite('resources/js/app.js')
  </body>
</html>