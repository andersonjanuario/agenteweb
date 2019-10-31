<?php
require_once 'include.php';
if(isset($_SESSION["login"])){
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
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!--script src="js/jquery-1.12.4.js"></script-->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/library.js"></script>
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
	exibirQuestion("Tem certeza que deseja remover?","* Todos os itens que se relacionam também serão removidos");
}else{
  echo "<script>javascript:open('index.php?m=1', '_top')</script>";
}
?>