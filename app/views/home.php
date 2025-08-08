<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        /* TEST GWebhook   */
        /* Estilos para la barra de navegación   */
        .navbar {
            background-color: whitesmoke; /* Color de fondo semi-transparente */
            height: 50px; /* Ajusta la altura de la barra según sea necesario */
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000; /* Asegura que la barra de navegación esté sobre el contenido */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .navbar img {
            height: 30px; /* Ajusta la altura de la imagen según sea necesario */
        }
        /* Estilos para el fondo de la página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://i.pinimg.com/originals/b9/c7/1f/b9c71f502ef6e37adf82cce392fec64f.jpg'); /* Ruta de tu imagen de fondo */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-size: cover; /* La imagen de fondo cubre todo el cuerpo */
            color: black; /* Color del texto */
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Hacemos que el cuerpo ocupe toda la altura visible */
        }
        /* Estilos para el contenido */
        .content {
            padding: 20px; /* Ajusta el relleno del contenido según sea necesario */
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 18px;
            cursor: pointer;
            background-color: rgba(blue); /* Color de fondo semi-transparente */
            color: black;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .buttons button:hover {
            background-color: rgba(255, 255, 255, 0.7); /* Color de fondo semi-transparente al pasar el ratón */
        }
    </style>
</head>
<body>

<div class="navbar">
    <img src="https://th.bing.com/th/id/OIP.aTdN9w1HA2H_f19VjygqGAHaHa?rs=1&pid=ImgDetMain" alt="Logo"> <!-- Ruta de tu imagen de logo -->
</div>

<div class="content">
    <h1>Bienvenido</h1>
    <div class="buttons">
        <button><a href ="/Miembro">Miembros</a></button>
        <button><a href ="/Ministerio">Ministerios</a></button>
        <button>Matrimonios</button>
        <button>Bautizos</button>
    </div>
</div>

</body>
</html>
