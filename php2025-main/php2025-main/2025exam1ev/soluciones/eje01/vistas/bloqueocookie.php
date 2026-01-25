<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Clientes Bloqueado</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f9; display: flex; justify-content: center; height: 100vh; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        input { display: block; margin: 10px 0; padding: 8px; width: 100%; }
        button { background: #6c5ce7; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; }
        .error { color: red; font-size: 0.9em; align-content: center; }
    </style>
</head>
<body>
    <div class="card">
        <h2>&#128176; GANA O PIERDE </h2>
        <p class='error'>Acceso bloqueado</p>
        <p> Volver a intentar en unos minutos </p>
        <button onclick="window.location.href='index.php'">Recargar</button>
    </div>
</body>
</html>
