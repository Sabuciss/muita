<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "Muita" }}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
 
  <!-- @auth -->
      <x-navigation></x-navigation>
  <!-- @endauth -->

  {{ $slot }}
</body>
</html>
