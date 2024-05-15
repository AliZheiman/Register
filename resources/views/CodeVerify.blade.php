<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodeVerify</title>
</head>
<body>
    <div>
        <form action="{{ route("codeVerify") }}" method="POST">
            @csrf
            <label for="email">Email</label>
            <br>
            <input type="text" name="email" id="">
            <br>
            <label for="code">Code</label>
            <br>
            <input type="text" name="code" id="">
            <br>
            <button type="submit">Verify</button>
        </form>
    </div>
</body>
</html>
