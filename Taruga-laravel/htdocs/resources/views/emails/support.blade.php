<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Mensagem de Suporte</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px;">

    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <header style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">
            <h2>Nova Mensagem de Suporte</h2>
        </header>
        
        <div style="padding: 20px;">
            <p><strong>Nome:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Mensagem:</strong></p>
            <p style="background-color: #f9f9f9; padding: 10px; border-radius: 5px; font-style: italic;">
                {{ $message }}
            </p>

            @if (isset($hasAttachment) && $hasAttachment)
                <p style="color: #4CAF50;"><strong>⚠️ Este e-mail contém um arquivo anexado:</strong></p>
                <p><strong>Nome do Arquivo:</strong> {{ $attachmentName }}</p>
            @else
                <p style="color: #999;">Nenhum arquivo foi anexado a esta mensagem.</p>
            @endif
        </div>
        
        <footer style="background-color: #4CAF50; color: white; text-align: center; padding: 10px; font-size: 12px;">
            <p>&copy; 2024 Beemay - Suporte</p>
        </footer>
    </div>
</body>
</html>

