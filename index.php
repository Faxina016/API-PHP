<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca com Mapa</title>
    <!-- Importando Fonte Moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- CSS do Leaflet (Mapa) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- SEU CSS EXTERNO -->
    <link rel="stylesheet" href="css/style_index.css">
</head>
<body>

<div class="wrapper">
    <div class="main-container">
        <h2>Consultar CEP</h2>
        
        <form method="POST" class="form-busca">
            <input type="text" name="cep" placeholder="Digite o CEP (apenas números)" required>
            <button type="submit" class="btn-busca">Buscar Endereço</button>
        </form>

        <?php
        $logradouro = "";
        $cidade = "";
        $enderecoFormatado = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cep'])) {
            $cep = preg_replace('/[^0-9]/', '', $_POST['cep']);
            $url = "https://viacep.com.br/ws/{$cep}/json/";
            $response = @file_get_contents($url);

            if ($response) {
                $dados = json_decode($response);
                if (isset($dados->localidade)) {
                    $logradouro = $dados->logradouro;
                    $cidade = $dados->localidade;
                    $bairro = $dados->bairro;
                    $uf = $dados->uf;
                    $enderecoFormatado = "{$logradouro}, {$bairro} - {$cidade}/{$uf}";

                    echo "<div class='resultado'>";
                    echo "<strong>Endereço encontrado:</strong><br>";
                    echo $enderecoFormatado;
                    echo "</div>";
                } else {
                    echo "<p style='color:red; margin-bottom:15px; text-align:center;'>CEP não encontrado.</p>";
                }
            }
        }
        ?>

        <div id="map"></div>

        <?php if ($cidade != ""): ?>
            <form action="sucesso.php" method="POST">
                <input type="hidden" name="endereco_final" value="<?php echo htmlspecialchars($enderecoFormatado); ?>">
                <button type="submit" class="btn-confirmar">CONFIRMAR ENDEREÇO</button>
            </form>
        <?php endif; ?>
    </div>
</div>

<footer>
    <p>&copy; 2026 - Sistema de Busca com Mapa</p>
</footer>

<!-- JS do Leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var lat = -21.5011; 
    var lon = -50.3156;
    var map = L.map('map').setView([lat, lon], 13);
    var marker;

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    function buscarCepPorCoordenadas(lat, lng) {
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
            .then(response => response.json())
            .then(data => {
                if (data.address && data.address.postcode) {
                    let novoCep = data.address.postcode;
                    let nomeCompleto = data.display_name;
                    
                    document.querySelector('.resultado').innerHTML = `
                        <strong>Novo endereço detectado pelo mapa:</strong><br>
                        ${nomeCompleto}<br>
                        <strong>CEP:</strong> ${novoCep}
                    `;
                    document.querySelector('input[name="endereco_final"]').value = nomeCompleto;
                }
            });
    }

    <?php if ($cidade != ""): ?>
        var query = "<?php echo $logradouro . ', ' . $cidade; ?>";
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var newLat = data[0].lat;
                    var newLon = data[0].lon;
                    map.setView([newLat, newLon], 16);

                    marker = L.marker([newLat, newLon], { draggable: true }).addTo(map)
                        .bindPopup("Arraste para ajustar o local exato")
                        .openPopup();

                    marker.on('dragend', function(event) {
                        var position = marker.getLatLng();
                        buscarCepPorCoordenadas(position.lat, position.lng);
                    });
                }
            });
    <?php endif; ?>
</script>
</body>
</html> 