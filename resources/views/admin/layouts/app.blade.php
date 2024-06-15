<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @vite('resources/css/app.css')

  <title>@yield('title') - {{ config('app.name') }}</title>
</head>

<body>

  <section class="container p-4 mx-auto">
    <div class="flex flex-col w-full border-opacity-50">
      <header>
        <div class="grid h-20 card bg-base-300 rounded-box place-items-center">
          @yield('header')
        </div>
      </header>
    </div>

    <div class="content">
      @yield('content')
    </div>

    <footer>

    </footer>
  </section>
</body>

</html>
