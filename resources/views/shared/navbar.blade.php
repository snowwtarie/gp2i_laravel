<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">GP2I</a>
        </div>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/gp2i/public/home">Accueil</a></li>
                <li><a href="/gp2i/public/salle">Salle</a>
                <li><a href="/gp2i/public/materiel">Materiel</a>
                <li><a href="/gp2i/public/stock">Stock</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if (Auth::check()) 
                        @if(Auth::user()->hasRole('Manager')) 
                        <li><a href="admin">Admin</a></li> 
                        @endif 
                        <li><a href="users/logout">Logout</a></li> 
                        @else
						<li><a href="users/register">Register</a></li>
						<li><a href="users/login">Login</a></li>
					@endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>