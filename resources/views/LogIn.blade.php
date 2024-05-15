<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('LogIn') }}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <br>
            <input type="email" name="email" id="">
            <br>
        </div>
        <div>
            <label for="phone">Phone</label>
            <br>
            <input type="tel" name="phone" id="">
            <br>
        </div>
        <div>
            <label for="password">Password</label>
            <br>
            <input type="text" name="password" id="">
            <br>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
