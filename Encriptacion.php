<?php
/* encriptacion.php: Cifrado AES-128-CBC con diseño profesional */

// Inicializar variables
$mensaje = "";
$clave = "";
$iv_hex = "";
$cifrado_base64 = "";
$descifrado = "";
$error = "";

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!empty($_POST["mensaje"]) && !empty($_POST["clave"])) {

        $mensaje = $_POST["mensaje"];
        $clave = $_POST["clave"];

        // Normalizar clave a 16 caracteres
        if (strlen($clave) > 16) {
            $clave = substr($clave, 0, 16);
        } else {
            $clave = str_pad($clave, 16, "0");
        }

        // Generar IV dinámico
        $iv = openssl_random_pseudo_bytes(
            openssl_cipher_iv_length("AES-128-CBC")
        );

        $iv_hex = bin2hex($iv);

        // Cifrar
        $cifrado = openssl_encrypt(
            $mensaje,
            "AES-128-CBC",
            $clave,
            0,
            $iv
        );

        $cifrado_base64 = $cifrado;

        // Descifrar
        $descifrado = openssl_decrypt(
            $cifrado,
            "AES-128-CBC",
            $clave,
            0,
            $iv
        );

    } else {
        $error = "⚠️ Por favor completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifrado AES-128-CBC</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg, #141e30, #243b55);
            overflow:auto;
            padding:20px;
        }

        .contenedor{
            width:100%;
            max-width:800px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            border-radius:20px;
            padding:40px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            border:1px solid rgba(255,255,255,0.2);
            color:white;
            animation: aparecer 0.8s ease;
        }

        @keyframes aparecer{
            from{
                opacity:0;
                transform: translateY(30px);
            }
            to{
                opacity:1;
                transform: translateY(0);
            }
        }

        h1{
            text-align:center;
            margin-bottom:30px;
            font-size:32px;
            color:#00e5ff;
        }

        label{
            font-size:16px;
            margin-bottom:8px;
            display:block;
            font-weight:bold;
        }

        textarea,
        input[type="text"]{
            width:100%;
            padding:15px;
            border:none;
            outline:none;
            border-radius:12px;
            margin-bottom:20px;
            font-size:15px;
            background: rgba(255,255,255,0.15);
            color:white;
            transition:0.3s;
        }

        textarea::placeholder,
        input::placeholder{
            color:#ddd;
        }

        textarea:focus,
        input[type="text"]:focus{
            background: rgba(255,255,255,0.25);
            transform: scale(1.01);
            box-shadow:0 0 10px #00e5ff;
        }

        .btn{
            width:100%;
            padding:15px;
            border:none;
            border-radius:12px;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            color:white;
            font-size:18px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        .btn:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 20px rgba(0,0,0,0.3);
        }

        .resultado{
            margin-top:30px;
            background: rgba(255,255,255,0.12);
            padding:25px;
            border-radius:15px;
            border-left:5px solid #00e5ff;
        }

        .resultado h2{
            margin-bottom:20px;
            color:#00e5ff;
        }

        .resultado p{
            margin-bottom:15px;
            line-height:1.6;
            word-wrap:break-word;
        }

        .error{
            background:#ff4d4d;
            color:white;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            text-align:center;
            font-weight:bold;
        }

        .footer{
            text-align:center;
            margin-top:25px;
            color:#ccc;
            font-size:14px;
        }

    </style>
</head>

<body>

<div class="contenedor">

    <h1>🔐 Cifrado AES-128-CBC</h1>

    <?php if(!empty($error)): ?>
        <div class="error">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <label>Mensaje en Claro</label>
        <textarea 
            name="mensaje" 
            rows="5"
            placeholder="Escribe tu mensaje aquí..."
        ><?= htmlspecialchars($mensaje) ?></textarea>

        <label>Clave Secreta</label>
        <input 
            type="text" 
            name="clave"
            placeholder="Ingresa tu clave secreta"
            value="<?= htmlspecialchars($clave) ?>"
        >

        <button type="submit" class="btn">
            🚀 Cifrar Mensaje
        </button>

    </form>

    <?php if(!empty($cifrado_base64)): ?>

        <div class="resultado">

            <h2>📌 Resultados del Cifrado</h2>

            <p>
                <strong>🔑 IV (Hex):</strong><br>
                <?= $iv_hex ?>
            </p>

            <p>
                <strong>🔒 Texto Cifrado (Base64):</strong><br>
                <?= $cifrado_base64 ?>
            </p>

            <p>
                <strong>✅ Texto Descifrado:</strong><br>
                <?= htmlspecialchars($descifrado) ?>
            </p>

        </div>

    <?php endif; ?>

    <div class="footer">
        Sistema de Encriptación con PHP + OpenSSL
    </div>

</div>

</body>
</html>
