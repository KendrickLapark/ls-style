<div id="divHeader">
    <div id="logo">
        <a href="{{ route('home') }}">
            <img width="200" height="30" src="<?php echo asset('images/logo-fundacion-magtel-horizontal.png'); ?>" alt="header-logo" />
        </a>
    </div>
    <div id="mainMenu">
        <ul>
            <li><a href="{{ route('vol.login') }}" class="botones botonesAB">Acceder</a></li>
            <li><a href="{{ route('vol.create') }}" class="botones botonesBA">Hazte Voluntario</a></li>
        </ul>
    </div>
</div>
