<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Shops : Trang quản trị - Dashboard</title>

<link href="{!!url('public/back-end/css/bootstrap.min.css')!!}" rel="stylesheet">
<link href="{!!url('public/back-end/css/datepicker3.css')!!}" rel="stylesheet">
<link href="{!!url('public/back-end/css/styles.css')!!}" rel="stylesheet">
<script type="text/javascript" src="{!! url('public/plugin/ckeditor/ckeditor.js') !!}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="{!!url('public/css/style.css')!!}">

<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<!--Icons-->
<script src="{!!url('public/back-end/js/lumino.glyphs.js')!!}"></script>

<!--[if lt IE 9]>
<script src="public/js/html5shiv.js"></script>
<script src="public/js/respond.min.js"></script>
<![endif]-->
<script>
    $(document).ready(function() {
       $('#transactiontable').DataTable();
     });
 </script>
</head>