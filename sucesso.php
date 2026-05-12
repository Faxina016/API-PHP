<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso - Endereço Confirmado</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_sucesso.css">
</head>
<body>

    <div class="wrapper">
        <div class="container">
            <div class="card">
                <div class="icon-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                
                <h1>Endereço Confirmado!</h1>
                <p>Os dados foram processados e salvos com sucesso no sistema.</p>

                <?php if (isset($_POST['endereco_final'])): ?>
                    <div class="info-box">
                        <strong>Localização Final:</strong><br>
                        <span><?php echo htmlspecialchars($_POST['endereco_final']); ?></span>
                    </div>
                <?php endif; ?>

                <a href="index.php" class="btn-voltar">Voltar ao Início</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 - Sistema de Busca com Mapa</p>
    </footer>

</body>
</html>