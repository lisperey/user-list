<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
</head>
<body>
    <div>
        @foreach ($apiArray['users'] as $user)
        <ul>
            <li>{{$user['name']}}</li>
        </ul>
            
        @endforeach
    </div>
    
</body>
</html>