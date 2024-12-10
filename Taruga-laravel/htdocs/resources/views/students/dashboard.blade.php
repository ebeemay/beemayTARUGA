<!DOCTYPE html>
<html>
<head>
    <title>Dashboard do Estudante</title>
</head>
<body>
    <h1>Bem-vindo, {{ auth()->user()->nome }}</h1>
    <form action="{{ route('student.logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>
</body>
</html>
