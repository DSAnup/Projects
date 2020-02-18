<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url() . 'admin_file/admin/' ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>admin_file/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() . 'admin_file/admin/' ?>plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'admin_file/admin/' ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->

     <!-- chosen css start -->
     <link rel="stylesheet" href="<?= base_url() . 'admin_file/admin/' ?>plugins/chosen/docsupport/prism.css">
     <link rel="stylesheet" href="<?= base_url() . 'admin_file/admin/' ?>plugins/chosen/chosen.css">
     <!-- chosen css end -->
     
     <link rel="stylesheet" href="<?= base_url() . 'admin_file/admin/' ?>dist/css/skins/_all-skins.min.css">
     <link rel="stylesheet" type="text/css" href="<?=base_url()?>jquery-ui-1.12.1/jquery-ui.min.css">
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "c90c74b3-0b13-474e-9eaa-920f14beaba5",
    });
  });
</script>

</head>
<body class="hold-transition skin-blue sidebar-mini">