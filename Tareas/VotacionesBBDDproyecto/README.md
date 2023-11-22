## **ENUNCIADO TAREA07**
Implementaremos un sistema de votación en nuestra página de productos, de manera que, cualquier cliente validado pueda dar una puntuación del **1** al **5** a cada producto. Las valoraciones se reflejarán de manera inmediata en nuestra página gracias a ``Jaxon``.

Haremos la página de Login similar a la del apartado 3.4.  En la validación, los errores se controlarán con ``Jaxon``.

Un cliente **NO** podrá valorar dos veces el mismo producto.

Utilizaremos ``Jaxon`` para presentar en tiempo real los cambios en la valoración cada vez que un cliente vote por un producto. Para ello implementaremos el  método ``PHP "miVoto"`` que insertará el voto, si es la primera vez que el cliente valora un producto, y devolverá:

La valoración de ese producto (la media de las valoraciones)
False si el usuario ya ha valorado ese producto.
El método PHP: "``pintarEstrellas``" que se encargará de devolver el número de clientes que han valorado ese producto y las estrellas que se pintarán.

Para guardar los votos de cada producto por parte de cada cliente nos crearemos la tabla "``votos``" (se adjunta el guion ``SQL`` de la misma)

En la tabla usuarios, ya existente, guardaremos varios usuarios para ir votando por los productos. Se recomienda hacer uso de los iconos ``Font Awesome`` para representar las valoraciones. Fíjate en el vídeo

Las valoraciones de cada producto serán la media aritmética de las mismas, es decir, si un cliente ha valorado con **3/5** y otro con **5/5** la valoración será de **4**. **Como puntuamos sobre 5 la valoración media máxima será de 5 estrellas**. Si la parte decimal de la media de las valoraciones es superior o igual a 0.5 pintaremos media estrella.

Mostraremos también la cantidad de valoraciones que ha recibido un producto (es decir la cantidad de clientes que lo han votado).

Fíjate en el vídeo siguiente, podrás comprobar que están activadas las opciones de depuración en ``Jason``, lo que nos ayudará a detectar y corregir posibles errores de código.

En el "``onclick``" de botón botar llamaremos a la función "``JavaScript``" que se encargará de llamar a los métodos ``PHP`` ya mencionados

Guión con la tabla "``votos``" para añadir a la base de datos "``proyecto``": [Descargar](https://github.com/AlbaGonzalezPereira/daw_dwes/blob/main/DWES07_JAXON/sql/tablavotos.sql)