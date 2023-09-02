<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emails</title>
</head>
<body>
    {{-- nuova email  --}}
    <h1>Object: {{ $emailData["object"] }}</h1>
    <h2>From: {{ $emailData["name"] . ' ' . $emailData["surname"] }}</h2>
    <h3>Email: {{ $emailData["email"] }}</h3>
    <p>Message: {{ $emailData["message"] }}</p>
</body>
</html>

