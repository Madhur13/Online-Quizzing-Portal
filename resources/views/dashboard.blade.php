
<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->

        {!! MaterializeCSS::include_full() !!}

        <script src="https://use.fontawesome.com/5fd0aa1ca7.js"></script>
        
        <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        
        <link href="/css/style.css" type="text/css" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        
        <header>
            <nav>
                <div class="nav-wrapper">
                  <a href="#!" class="brand-logo">Fusion</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="/logout">Logout</a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                  </ul>
                </div>
            </nav>
        </header>
        
        <div class="sidebar">
            <ul id="slide-out" class="side-nav fixed">
                <li><a href="#!" class="waves-effect">First Link</a></li>
                <li><a href="#!" class="waves-effect">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link</a></li>
            </ul>
        </div>
        
        
        <div class="main-container row">
        <h4 class="col s12 m4 offset-m4">Welcome {{Auth::user()->username}}</h4>
        <div class="button-container col s12 m6">
            <a href="/attachRole/manager" class="button col s8 offset-s2">
                <i class="fa fa-plus-circle"></i>
                <div class="divider col s12"></div>
                <h5 class="col s12">Make {{Auth::user()->username}} manager</h5>
            </a>
        </div>
        <div class="button-container col s12 m6">
            <a href="/attachRole/admin" class="button col s8 offset-s2">
                <i class="fa fa-plus-circle"></i>
                <div class="divider col s12"></div>
                <h5 class="col s12">Make {{Auth::user()->username}} admin</h5>
            </a>
        </div>

        @if(Auth::user()->hasRole('manager'))
            <h5 class="col s12 m6 offset-m3" style="text-align: center">{{Auth::user()->username}} is a manager!!</h5>
        @endif
        @if(Auth::user()->hasRole('admin'))
            <h5 class="col s12 m6 offset-m3" style="text-align: center">{{Auth::user()->username}} is an admin!!</h5>
        @endif
        </div>
        
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
        </script>
    </body>
  </html>