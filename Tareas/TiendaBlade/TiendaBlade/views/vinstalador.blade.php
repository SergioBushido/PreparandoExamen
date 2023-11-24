@extends('plantillas.plantilla1')
@section('titulo')
    {{$titulo}}
@endsection
@section('encabezado')
    {{$encabezado}}    
@endsection
@section('contenido')
<form action="instalador.php" method="POST">
<p>Bienvenido al instalador de tu tienda online, gracias por elegir nuestro producto y recuerda que este
  es un proyecto libre y colaborativo, eres libres de modificar y jugar con el código.
</p>
<p>Antes de comenzar con la instalación debes tener en cuenta los siguientes aspectos para que todo 
  funcione correctamente.
</p>
<ul>
  <li>Este proyecto está desarrollado sobre la versión 8.0.30 de PHP, es recomendable trabajar sobre la misma.</li>
  <li>Necesitarás una base de datos MySQL, no es necesario que crees la base de datos pero si que el servicio esté disponible.</li>
  <li>La tienda utiliza la generación de QR para los productos, para generar dicho contenido es necesario que tengas instalado el módulo 
    <i>php8.0-gd<i>, si utilizas linux deberas instalarlo y reiniciar el servidor apache.
  </li>
  <code>sudo apt install php8.0-gd</code><br>
  <code> sudo systemctl restart apache2</code>
  <li>Las carpetas <code>cache</code> y <code>src</code> deben tener permisos de lectura y escritura.</li>
  <li>Si el instalador falla o necesitas reinstalar la aplicación en otro sitio debes borrar el  
    fichero <code>src/Configuracion.php</code> 
  </li>
</ul>
<p>Si cumples con todos estos requisitos no debes tener problemas con la instalación, se bienvenido
  y disfruta del aprendizaje.
</p>
			<input type="submit" class="btn btn-primary" name="configurar" value="Iniciar instalador">
		</form>
@endsection