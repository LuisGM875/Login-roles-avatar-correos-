Para el usuario del correo {{ $demo->correo }}
This is a demo email for testing purposes! Also, it's the HTML version.

Los siguientes son tus datos ingresados:

Nombre: {{ $demo->usuario }}
Apellido: {{ $demo->identificacion }}

Tu rol es: {{ $demo->receiver }}
Puedes ingresar de la siguiente manera:

con el correo: {{ $demo->correo }}
o con el usuario: {{ $demo->tag }}

Gracias por registrarte en esta pagina

