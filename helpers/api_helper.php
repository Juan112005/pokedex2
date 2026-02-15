<?php
/**
 * Realiza una petición HTTP y devuelve código de estado, cuerpo y datos para log en consola.
 * @param string $url URL a solicitar
 * @param string $label Etiqueta para identificar la petición en consola (ej: "Lista Pokémon", "Detalle Pokémon")
 * @return array ['data' => array|null, 'log' => ['label'=>..., 'status'=>int, 'message'=>string, 'url'=>string]]
 */
function fetchPokeApi($url, $label = 'PokeAPI') {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_HTTPHEADER => ['Accept: application/json'],
    ]);
    $body = curl_exec($ch);
    $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    $message = $curlError ?: (
        $httpCode >= 200 && $httpCode < 300 ? 'OK' :
        ($httpCode >= 400 ? 'Error del cliente/servidor' : 'Código ' . $httpCode)
    );

    $log = [
        'label' => $label,
        'status' => $httpCode,
        'message' => $message,
        'url' => $url,
    ];
    if ($curlError) {
        $log['error'] = $curlError;
    }

    $data = null;
    if ($body && $httpCode >= 200 && $httpCode < 300) {
        $decoded = json_decode($body, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $data = $decoded;
        } else {
            $log['message'] = 'Respuesta no es JSON válido';
        }
    }

    return ['data' => $data, 'log' => $log];
}
