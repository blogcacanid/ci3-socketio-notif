<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Realtime Notification Dengan Socket.io | CodeIginter 3</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/toastr/build/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?= base_url('admin') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>IO</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Socket</b>IO</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="<?= base_url('admin') ?>">
                            <img src="<?= base_url() ?>/assets/adminlte/img/user2-160x160.jpg" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= base_url() ?>/assets/adminlte/img/user2-160x160.jpg" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="<?= base_url('pegawai') ?>">
                        <i class="fa fa-users"></i> <span>Pegawai</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Pegawai<small>List</small></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Pegawai</h3>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"data-target="#modal-default" title="Add New Pegawai">
                                    <i class="fa fa-plus"></i>
                                    &nbsp;&nbsp;Add Record
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="pegawai" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama Pegawai</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.13
        </div>
        <strong>
            Copyright &copy; 2019<?php if (date('Y')> 2019){echo ' - '.date('Y');}?>&nbsp;<a href="https://blog.cacan.id">CACAN BLOG</a>.
        </strong> 
        All rights reserved.
    </footer>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Pegawai</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Enter Nama Pegawai..." id="pegawai_name"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="add_pegawai">Add</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>/assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>/assets/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/adminlte/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/toastr/build/toastr.min.js"></script>
<!-- Socket.IO -->
<script src="<?= base_url() ?>/assets/socket.io/dist/socket.io.js"></script>
<!-- page script -->
<script>
    $(function () {
        let ipAddress = "<?= $ip ?>";

        if (ipAddress == "::1") {
            ipAddress = "localhost"
        }

        const port = "3000";
        const socketIoAddress = `http://${ipAddress}:${port}`;
        const socket = io(socketIoAddress);

        const pegawaiTable = $('#pegawai').DataTable();
        const reloadTable = function () {
            $.ajax({
                url: "<?= base_url('pegawai/list_pegawai') ?>",
                method: "GET",
                dataType: "json",
                async: false,
                success: function (data) {
                    const pegawai = data.data;
                    if (pegawai.length != 0) {
                        pegawaiTable.clear();
                        for (let x of pegawai) {
                            pegawaiTable.row.add([
                                x.name,
                            ]).draw(false);
                        }
                    }
                },
            });
        }
        reloadTable();

        $("#add_pegawai").click(function () {
            const pegawaiName = $("#pegawai_name");
            if (pegawaiName != null && pegawaiName != "") {
                $.ajax({
                    url: "<?= base_url('pegawai/add_pegawai') ?>",
                    method: "POST",
                    async: false,
                    data: JSON.stringify({
                        pegawai_name: pegawaiName.val(),
                    }),
                    type: "application/json",
                    success: function (data) {
                        socket.emit('reload-table');
                        reloadTable();
                        toastr.success(data.message, 'Adding New Pegawai');
                    }
                });
            }
            pegawaiName.empty();
        });

        socket.on('reload', () => {
            toastr.info('Other User Adding New Pegawai', 'Reload');
            reloadTable();
        });
    })
</script>
</body>
</html>
