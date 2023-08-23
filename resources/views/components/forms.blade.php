@props([
    'vista'=>'Actualiza'
])

@if($vista=='Inicio de sesion')
    <div class="bg-img">
        <div class="content">
            <header>Inicia sesion</header>
            <form method="POST" action="{{route('IniciaSesion')}}">
                @csrf
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" id="UserorEmail" name="UserorEmail" required placeholder="Usuario o Correo" autocomplete="disable">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="password" id="password" class="pass-key" required placeholder="Contraseña">
                    <span id="passwordToggle" class="fa fa-eye" onclick="ver()"></span>
                </div>
                <div class="pass">
                    <a href="recuperar">Recuperar contraseña</a>
                </div>
                <div class="field">
                    <input type="submit" value="Inicia sesion">
                </div>
            </form>
            <div class="login">O registrate con</div>
            <div class="form-group pt-0">
                <div class="_social_04">
                    <ol>
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-twitter"></i></li>
                        <li><i class="fa fa-google-plus"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                    </ol>
                </div>
            </div>
            <div class="signup">No tienes una cuenta?
                <a href="registro">Registrate aqui</a>
            </div>
        </div>
    </div>

@elseif($vista=='Registro')
@php($nombre="Hugo")
    <div class="bg-img">
        <div class="content">
            <header>Registrate aqui</header>
            <form method="POST" action="{{route('Registrar')}}">
                @csrf
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" id="nombre" name="nombre" required placeholder="Nombre">
                </div>
                <div class="field space">
                    <span class="fa fa-user"></span>
                    <input type="text" id="apellido" name="apellido" required placeholder="Apellido">
                </div>
                <div class="field space">
                    <span class="fa fa-envelope"></span>
                    <input type="text" id="email" name="email" required placeholder="Correo">
                </div>
                <div class="field space">
                    <span class="fa fa-users"></span>
                    <input type="text" id="usuario" name="usuario" required placeholder="Nombre de usuario">
                </div>
                <div class="space">
                    <img src="https://api.dicebear.com/6.x/adventurer/svg?seed=Luisa&backgroundColor=18F322" alt="" width="70px">
                    <div>
                        <label for="avatarCheckbox" class="signup mb-10">
                            <span>¿Quieres un avatar de este estilo?</span>
                        </label>
                        <input  class="form-check-input" type="checkbox" id="avatarCheckbox" name="avatarCheckbox">
                    </div>
                </div>

                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" id="password" name="password" class="pass-key" required placeholder="Contraseña">
                    <span id="passwordToggle" class="fa fa-eye" onclick="ver()"></span>
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" id="confirm" name="confirm" class="pass-key" required placeholder="Confirma Contraseña">
                </div>
                <div class="space">
                    <div class="signup">Ya tienes una cuenta?
                        <a href="{{route('login')}}">Inicia sesion aquí</a>
                    </div>
                </div>
                <div class="field">
                    <input type="submit" value="Registrarse">
                </div>
            </form>

        </div>
    </div>
@elseif($vista=='Recuperar')
    <div class="bg-img">
        <div class="content">
            <header>Recuperar contraseña</header>
            <form action="#">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" required placeholder="Usuario o Correo">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" id="password" class="pass-key" required placeholder="Contraseña">
                    <span id="passwordToggle" class="fa fa-eye" onclick="ver()"></span>
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" id="confirm" class="pass-key" required placeholder="Confirma Contraseña">
                </div>
                <div class="space">
                    <div class="signup">
                        <a href="{{route('login')}}">Regresar</a>
                    </div>
                </div>
                <div class="field space">
                    <input type="submit" value="Cambiar contraseña">
                </div>
            </form>
        </div>
    </div>
@elseif($vista=='Configuracion')

@endif



