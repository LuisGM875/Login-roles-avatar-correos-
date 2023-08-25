Para el usuario del correo <i>{{ $demo->correo }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>

<p><u>Los siguientes son tus datos ingresados:</u></p>

<div>
    <p><b>Nombre:</b>&nbsp;{{ $demo->usuario }}</p>
    <p><b>Apellido:</b>&nbsp;{{ $demo->identificacion }}</p>
</div>
<p><b>Tu rol es: </b>&nbsp;{{ $demo->receiver }}</p>
<p><u>Puedes ingresar de la siguiente manera: </u></p>

<div>
    <p><b>con el correo:</b>&nbsp;{{ $demo->correo }}</p>
    <p><b>o con el usuario:</b>&nbsp;{{ $demo->tag }}</p>
</div>

Gracias por registrarte en esta pagina
<br/>
