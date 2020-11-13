
<html>
    <head>
        <title>Usuarios</title>
    </head>

    <body>
        <h1>Listado de usuarios</h1>
        <ul>
            <?php
            function curl_get_contents($url)
			{
			  $ch = curl_init($url);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			  $data = curl_exec($ch);
			  curl_close($ch);
			  return $data;
			}
			$url = 'http://minimal_django:4001/usuarios/';
			$json = json_decode(curl_get_contents($url));
            //$json = file_get_contents('http://localhost:4001/pets');
            $usuarios = $json->results;
            foreach ($usuarios as $usuario) {
            $name = $usuario->nombre;
                echo "<li>Nombre: $name </li>";
            }
            ?>
        </ul>
    </body>
</html>
