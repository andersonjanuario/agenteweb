<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Agente Web</title>
  </head>
  <body>

    <div id="msgSlide" class="msgSlide"></div>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Agente Web</h1>
      </div>
      <div class="login-box">
        <form action="#" method="post" name="formLogin" id="formLogin" class="login-form">
          <input type="hidden" name="retorno" id="retorno" value="msgSlide"/>
          <input type="hidden" name="controlador" id="controlador" value="ControladorLogin"/>
          <input type="hidden" name="funcao" id="funcao" value="validarLogin"/>
          <input type="hidden" name="mensagem" id="mensagem" value="10"/>          
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>
          <div class="form-group">
            <label class="control-label">Usuário:</label>
            <input name="login" id="login" title="Username" value="" class="form-control" type="text" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Senha:</label>
            <input name="senha" id="senha"  type="password" title="Password" value="" class="form-control">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <!--label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label-->
              </div>
              <!--p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p-->
            </div>
          </div>
          <div class="form-group btn-container">
            <a id="loginbtn" class="btn btn-primary btn-block formLogin" style="color:#FFF;"><i class="fa fa-sign-in fa-lg fa-fw"></i>Logar</a>
          </div>
        </form>
        <!--form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form-->
    </div>     
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>

    <script src="js/lib.js" type="text/javascript" ></script>
        <script language="JavaScript">
          function enterPressed(evn) {
            if (window.event && window.event.keyCode == 13) {
              $('.formLogin').click();
            } else if (evn && evn.keyCode == 13) {
              $('.formLogin').click();           
            }
          }
          document.onkeypress = enterPressed;
        </script>    
      </body>
</html>