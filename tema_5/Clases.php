<?php
require_once('../templates/page.php');
require_once('Estudiante.php');

initPage('Clases.php');
printStatement('<p>
Crea una página llamada clases.php con:</p>
<p>• una clase llamada Persona que tenga como atributos un DNI, un nombre y un email.</p>
<p>– Crea un constructor que permita rellenar esos tres atributos,</p>
<p>– y los getters y setters correspondientes.</p>
<p>– Define también un método Mostrar para sacar por la página los datos de la persona (en un párrafo, separados por guiones).</p>
<p>– Define adecuadamente la visibilidad (pública o privada) de cada atributo o método.</p>
<p>• Crea una segunda clase llamada Estudiante que:</p>
<p>– herede de Persona</p>
<p>– añada un atributo llamado numExpediente.</p>
<p>– Crea su constructor, sus getters y setters y su correspondiente método Mostrar.</p>
<p>Fuera de las clases, entre el código HTML de la página,crea un objeto de cada tipo (una Persona y un Estudiante), con los valores que quieras, llama después a algún setter de cada una para cambiar el valor de algún atributo, y finalmente llama a sus métodos Mostrar para que saquen la información de cada uno</p>');

$person = new Persona('12345678A', 'Ana', 'correo_de_ana@gmail.com');
$student = new Estudiante('87654321B', 'Marcos', 'correo_de_marcos@gmail.com', 13442);

$person->setNombre('Sara');
$student->setDni('23415654V');

$person->Mostrar();
$student->Mostrar();

endPage();
?>