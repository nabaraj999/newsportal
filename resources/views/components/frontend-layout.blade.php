<!DOCTYPE html>
<html lang="en">
@props(['title', 'description', 'keywords'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <title>Online Khotang| {{ $title ?? 'Home' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">
</head>

<body>
    <x-frontend-header />

    <main>
        {{ $slot }}
    </main>

    <x-frontend-footer />
    <script>
          const disabledKeys = ["c", "C", "x", "J", "u", "I","s"]; // keys that will be disabled
  const showAlert = e => {
    e.preventDefault(); // preventing its default behaviour
    return alert("oh oh, not this way mate!");
  }
  document.addEventListener("contextmenu", e => {
    showAlert(e); // calling showAlert() function on mouse right click
  });
  document.addEventListener("keydown", e => {
    // calling showAlert() function, if the pressed key matched to disabled keys
    if((e.ctrlKey && disabledKeys.includes(e.key)) || e.key === "F12") {
      showAlert(e);
    }
  });
    </script>
</body>

</html>
