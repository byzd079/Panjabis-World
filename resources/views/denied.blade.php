<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link rel="stylesheet" href="{{ asset('css/denied.css') }}">
    <script src="{{ asset('js/denied.js') }}"></script>
</head>
<body>
    <div class="denied-container">
        <h1>403 - Access Denied</h1>
        <p>Sorry, you do not have permission to access this page.</p>
        <a href="{{ url('/') }}">Go Back to Home</a>
    </div>
</body>
</html>
