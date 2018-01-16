
<!DOCTYPE html>
  <html>
    <head>
        
        <title>IIITDMJ Fusion</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->

        {!! MaterializeCSS::include_full() !!}

        <script src="https://use.fontawesome.com/5fd0aa1ca7.js"></script>
        
        <!-- <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css"> -->
        
        <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        
        <link href="/css/style.css" type="text/css" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body style="background-color:#fff;overflow-y:hidden">
            
        @if($alert = Session::get('alert'))
            <script type="text/javascript">alert("{{$alert}}");</script>
        @endif

        <header class="row landing">
            <nav class="mynav">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo col s12 m3">IIITDMJ FUSION</a>
                    <div class="login-form col s12 m5 offset-m7">
                        <form method="post" action="/login" name="login_form">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="input-field col s10 offset-s1 m5">
                                  <input id="username" type="text" class="validate col s12" placeholder="Username" required name="login_username">
                            </div>
                            <div class="input-field col s10 offset-s1 m5" style="border-right:1px solid lightgrey">
                                  <input name="login_password" id="password" type="password" class="validate col s12" placeholder="Password" required>
                            </div>
                            <div class="input-field col s10 offset-s1 m2" style="border:0px;">
                                  <button class="btn waves-effect col s12" style="margin:0px;box-shadow:none;height:100%">Login</button>
                            </div>
                        </form>
<!--
                        <div class="col s12 m6 offset-m5" style="padding-left:0px">
                            <h6 class="col c12" >Want to be a part?? Then <a href="#">&nbsp;Sign Up</a></h6>
                        </div>
-->
                    </div>
                </div>
            </nav>
        </header>
        
        <div class="container row landing">
            <div class="content col s12 m6">
                <h2><small>The Automation Project of</small><strong><br>PDPM<br>IIITDM Jabalpur</strong></h2>
                <h5>Sign Up to be a part of it!!</h5>
            </div>
            <div class="sign-up col s12 m5 offset-m1">
                <div class="signup-form-container col s12">
                <h4>Sign Up</h4>
                <form class="col s12" method="post" action="/signup">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="input-field col s10 offset-s1 m8 offset-m2">
                          <input name="username" id="username" type="text" class="validate" placeholder="Username" required>
                    </div>
                    <div class="input-field col s10 offset-s1 m8 offset-m2">
                          <input name="email" id="email" type="email" class="validate" placeholder="Email" required>
                    </div>
                    <div class="input-field col s10 offset-s1 m8 offset-m2">
                          <input name="password" id="password" type="password" class="validate" placeholder="Password" required>
                    </div>
                    <div class="input-field col s10 offset-s1 m8 offset-m2">
                          <input name="confirm_pwd" id="Confirm Password" type="password" class="validate" placeholder="Confirm Password" required>
                    </div>
                    <div class="input-field col s10 offset-s1 m8 offset-m2">
                        <select required name="type">
                            <option value="" disabled selected>Signup as</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="input-field col s12">
                          <button class="btn waves-effect col s10 offset-s1 m4 offset-m4" style="height:45px">Submit</button>
                    </div>
                    
                </form>
                </div>
            </div>
            <div class="scroll">
                <h5>Scroll Down to know more.....</h5>
            </div>
        
        </div>
        
        
        
        
        
        <script>
            $(document).ready(function() {
                $('select').material_select();    
            });
            
        </script>
    </body>
  </html>