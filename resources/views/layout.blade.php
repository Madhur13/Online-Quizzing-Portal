<!DOCTYPE html>

<html>
<head>
    <title>IIITDMJ Fusion</title>
        
      <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
        
    <link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        
    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
        
    <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        
    <link href="/css/style.css" type="text/css" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    @yield('header')
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
    
	@yield('content')
    
    <script src="/js/jquery-3.1.1.min.js"></script>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
            $(".dropdown-button").dropdown();
            $('.modal').modal();
        });
    </script>
</body>

</html>