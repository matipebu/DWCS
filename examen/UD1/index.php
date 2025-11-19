<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/examen.css">
    <title>Examen UD 1</title>
</head>

<body>
    <header>
        <ul>
            <li><a href="resources/bd.html" target="_blank">Base de datos</a></li>
            <li><a href="resources/php-chunked-xhtml/index.html" target="_blank">Manual de PHP</a></li>
            <li><a href="http://localhost:8000/" target="_blank">PhpMyAdmin</a></li>
        </ul>
    </header>
    <h1>Examen UD1: PHP</h1>
    <table>
        <tr>
            <td class="ejercicio"><a href="ejercicio1/index.php" target="_blank">Ejercicio 1</a></td>
            <td class="enunciado">
                En el fichero ejercicio1/index.php, debes implementar la función analisisFrecuencias(string
                texto):array. Esta función recibe un string y devuelve un array donde se indica la cantidad de veces que
                aparece cada letra en el string. Ten en cuenta las siguientes consideraciones: 1.5puntos
                <ul>
                    <li>Las letras deben contarse tanto si aparecen en mayúscula como en minúscula.</li>
                    <li>No se contarán espacios, ni puntos, ni comas.</li>
                    <li>Las claves del array resultante serán las letras (en mayúscula) y el valor el número de veces
                        que aparece dicha letra en el texto.</li>
                    <li>Ejemplo: para el texto "Hola, esto es una prueba."<br>El resultado debe ser:
                        <pre>
 [ "H" => 1,
 "O" => 2,
 "L" => 1,
 "A" => 3,
 "E" => 3, 
 "S" => 2,
 "T" => 1,
 "U" =>1,
 "N" => 1,
 "P" => 1, 
 "R" => 1,
 "B" => 1 ];
                        </pre>
                    </li>

                </ul>
            </td>
            <td class="puntos">1.5 pts</td>
        </tr>
        <tr>
            <td class="ejercicio"><a href="ejercicio2/index.php" target="_blank">Ejercicio 2</a></td>
            <td class="enunciado">
                En el fichero ejercicio2/index.php, debes implementar una función llamada fibonacci($n) que reciba un
                número entero n ≥ 0 y devuelva el valor correspondiente de la sucesión de Fibonacci en la posción n.
                Recuerda que la sucesión se define de la siguiente manera:
                <ul>
                    <li>Fib(0) = 0</li>
                    <li>Fib(1) = 1</li>
                    <li>Fib(n) = Fib(n-1) + Fib(n-2), para n > 1</li>
                </ul>
                A modo de ejemplo, los 10 primeros valores de la sucesión son:
                <table style="border-collapse: collapse;text-align: center;">
                    <tr>
                        <td style="border: 1px solid #333;"><strong>n</strong></td>
                        <td style="border: 1px solid #333;">0</td>
                        <td style="border: 1px solid #333;">1</td>
                        <td style="border: 1px solid #333;">2</td>
                        <td style="border: 1px solid #333;">3</td>
                        <td style="border: 1px solid #333;">4</td>
                        <td style="border: 1px solid #333;">5</td>
                        <td style="border: 1px solid #333;">6</td>
                        <td style="border: 1px solid #333;">7</td>
                        <td style="border: 1px solid #333;">8</td>
                        <td style="border: 1px solid #333;">9</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #333;"><strong>fib(n)</strong></td>
                        <td style="border: 1px solid #333;">0</td>
                        <td style="border: 1px solid #333;">1</td>
                        <td style="border: 1px solid #333;">1</td>
                        <td style="border: 1px solid #333;">2</td>
                        <td style="border: 1px solid #333;">3</td>
                        <td style="border: 1px solid #333;">5</td>
                        <td style="border: 1px solid #333;">8</td>
                        <td style="border: 1px solid #333;">13</td>
                        <td style="border: 1px solid #333;">21</td>
                        <td style="border: 1px solid #333;">34</td>
                    </tr>
                </table>
            </td>
            <td class="puntos">1.5 pts</td>
        </tr>
        <tr>
            <td class="ejercicio"><a href="ejercicio3/listar_equipos.php" target="_blank">Ejercicio 3</a></td>
            <td class="enunciado" colspan="2">
                Se desea desarrollar una aplicación web para gestionar equipos que participan en un campeonato de
                cartas. Los equipos están almacenados en una base de datos en la tabla equipo y se caracterizan por
                tener un nombre, un número de integrantes, un email de contacto y una puntuación en el campeonato.
                Realiza los siguientes apartados. Puedes crear todos los ficheros que necesites, pero todos deben estar
                en el directorio ejercicio3.
            </td>
        </tr>
        <tr class="apartados">
            
            <td class="apartado"><a href="ejercicio3/listar_equipos.php" target="_blank">a</a></td>
            <td class="enunciado">
                Modifica el fichero ejercicio3/listar_equipos.php para que en la tabla aparezcan los equipos registrados
                en la base de datos. Si el servidor recibe una petición GET mostrará todos los equipos. El usuario
                también podrá filtrar los equipos que aparecen en la tabla poniendo todo o parte de su nombre en el
                campo nombre y presionando el botón filtrar.
            </td>
            <td class="puntos">1.75 pts</td>
        </tr>

        <tr class="apartados">
            <td class="apartado"><a href="ejercicio3/listar_equipos.php" target="_blank">b</a></td>
            <td class="enunciado">
                Modifica el fichero ejercicio3/listar_equipos.php para que los resultados puedan mostrarse ordenados de
                forma ascendente por los campos: nombre, participantes o puntuación. Para ello el usuario podrá
                presionar en la cabecera de cada columna (nombre, participantes o puntuación) para ordenar por dicho
                campo. Ten en cuenta que si la búsqueda está filtrada debe mantenerse el filtro tras la ordenación.
            </td>
            <td class="puntos">2.25 pts</td>
        </tr>
        <tr class="apartados">
            <td class="apartado"><a href="ejercicio3/listar_equipos.php" target="_blank">c</a></td>
            <td class="enunciado">
                Modifica los ficheros listar_equipos.php y modificar_equipo.php para que el usuario pueda actualizar los
                datos del equipo. Ten en cuenta lo siguiente:
                <ul>
                    <li> Se accederá al formulario de modificación de equipo mediante el enlace Editar de cada fila de
                        la
                        tabla. El formulario debe aparecer con los datos actuales del equipo.</li>
                    <li> Antes de guardar los cambios deben realizarse las siguientes validaciones:</li>
                    <ul>
                        <li>El correo debe ser válido, debes intentar sanearlo y si no puedes avisa al usuario.</li>
                        <li>El número de integrantes debe ser un número entero entre 2 y 5 (incluidos).</li>
                        <li>La puntuación debe ser un número decimal positivo e inferior a 100.</li>
                    </ul>
                </ul>
            </td>
            <td class="puntos">3.0 pts</td>
        </tr>
    </table>

</body>

</html>