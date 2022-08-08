<!DOCTYPE html>
<html>
<head>
    <title>E-mail de boas-vindas</title>
</head>

<body>
<h2>Bem-vindo ao Up!Stock, {{$user['name']}}</h2>
<br/>
Seu ID de e-mail registrado é {{$user['email']}}, Por favor, clique no link abaixo para verificar sua conta de e-mail
<br/>
<a href="{{ url('user/verify/', $user['verification_code']) }}">Verificar e-mail</a>
</body>

</html>