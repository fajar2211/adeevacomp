<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url('html/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('html/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo base_url('html/css/plugins/morris/morris-0.4.3.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('html/css/plugins/timeline/timeline.css') ?>" rel="stylesheet">
    
    <!--datatables-->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/bs/jqc-1.12.4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('html/datatables/datatables.min.css') ?>"/>
    
    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url('html/css/sb-admin.css') ?>" rel="stylesheet">
    
    <!--chart-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />-->