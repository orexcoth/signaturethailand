<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>
    <form action="{{ route('send.email') }}" method="GET">
        @csrf
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
