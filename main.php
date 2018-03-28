<?php
require_once 'include.php';
if(isset($_SESSION["login"])){
exibirQuestion("Tem certeza que deseja remover?","* Todos os itens que se relacionam também serão removidos");  
?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once("_head.php"); ?>
  <body class="app sidebar-mini rtl">
    <?php require_once("_navbar.php"); ?>
    <?php require_once("_sidebar.php"); ?>

    <main class="app-content" id="div_central">

      <?php

      $viewMain = new ViewMain();
      $viewMain->telaPrincipal();
      ?>

      <!--div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and modular admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>

      <div class="row" >
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Compatibility with frameworks</h3>
            <p>This theme is not built for a specific framework or technology like Angular or React etc. But due to it's modular nature it's very easy to incorporate it into any front-end or back-end framework like Angular, React or Laravel.</p>
            <p>Go to <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> for more details about integrating this theme with various frameworks.</p>
            <p>The source code is available on GitHub. If anything is missing or weird please report it as an issue on <a href="https://github.com/pratikborsadiya/vali-admin" target="_blank">GitHub</a>. If you want to contribute to this theme pull requests are always welcome.</p>
          </div>
        </div>
      </div-->

    </main>
            <!-- Essential javascripts for application to work-->
    <!--script src="js/jquery-3.2.1.min.js"></script-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/lib.js"></script>
        <!-- The javascript plugin to display page loading on top-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script src="js/blockUI/jquery.blockUI.js" type="text/javascript"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/popup-upload.js" type="text/javascript"></script>
    <script src="js/mascara.js" type="text/javascript"></script>
    <script src="js/jquery.form.js" type="text/javascript" ></script>
    <script src="js/jquery.maskMoney.js" type="text/javascript" ></script>    
  </body>
</html>
<?php
}else{
  echo "<script>javascript:open('index.php?m=1', '_top')</script>";
}
?>