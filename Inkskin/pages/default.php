<?php
    include('../storage/templateMaster.php');

    $temp_index = new TemplateMaster();

    $settings = array("title");
    $values = array("Inkster - Home");

    $temp_index->indexHeader($settings, $values);
?>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php $temp_index->navigation_element(); ?>
        </nav>
        
        <div id="page-wrapper">
            
            <div class="container-fluid">
                <?php $temp_index->center_elements(); ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
</body>
</html>