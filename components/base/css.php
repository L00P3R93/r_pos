<!-- Font Awesome Icons -->
<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="assets/md-iconic-font\css\material-design-iconic-font.css"/>
<!-- overlayScrollbars -->
<link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/util.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>-->
<!-- Google Font: Source Sans Pro -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Raleway', sans-serif;
    }
    .preview_image{
        width: 100px;
        height: 100px;
        border-radius: 10%;
    }
    .avatar{border-radius: 50%;}
    .content-wrapper, .main-header, .main-footer{
        margin-left: unset !important;
    }

    /*//////////////////////////////////////////////////////////////////
    [ Header cart ]*/
    .wrap-header-menu {
        position: fixed;
        z-index: 1100;
        width: 100%;
        height: 100vh;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0.0);
        visibility: hidden;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .header-cart {
        position: fixed;
        z-index: 1100;
        width: 300px;
        max-width: calc(100% - 30px);
        height: 100vh;
        top: 0;
        left: -400px;
        background-color: #fff;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.34;
        transition: all 0.4s;

        box-shadow: 0 3px 6px 0px rgba(0, 0, 0, 0.18);
        -moz-box-shadow: 0 3px 6px 0px rgba(0, 0, 0, 0.18);
        -webkit-box-shadow: 0 3px 6px 0px rgba(0, 0, 0, 0.18);
        -o-box-shadow: 0 3px 6px 0px rgba(0, 0, 0, 0.18);
        -ms-box-shadow: 0 3px 6px 0px rgba(0, 0, 0, 0.18);
    }

    .header-cart::after {
        content: "";
        display: block;
        width: 100%;
        height: 9%;
        min-height: 30px;
    }

    .show-header-cart {
        visibility: visible;
        background-color: rgba(0,0,0,0.6);
    }

    .show-header-cart .header-cart {
        left: 0;
    }

    /*---------------------------------------------*/
    .header-cart-title {
        width: 260px;
        max-width: 100%;
        height: 16.5%;
        min-height: 85px;
    }

    .header-cart-content {
        flex-grow: 1;
        overflow: auto;
        align-content: space-between;
    }

    .header-menu{
        width: 260px;
        max-width: 100%;
    }

    /*---------------------------------------------*/
    @media (max-width: 575px) {
        .header-cart {
            padding: 30px;
        }

        .header-cart-title {
            padding-bottom: 35px;
        }
    }

    .search-result{
        border-bottom:solid 1px #BDC7D8;
        padding:5px;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        color:blue;
    }

    .results {
        position: absolute;
        width: 90%;
        max-height: 40vh;
        overflow-y: scroll;
        margin-top: 5px;
        z-index: 10;
        padding: 0;
        border-width: 1px;
        border-style: solid;
        border-color: #cbcfe2 #c8cee7 #c4c7d7;
        border-radius: 3px;
        background-color: #fdfdfd;
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
        background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
        background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
        background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
        background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
        background-image: linear-gradient(top, #fdfdfd, #eceef4);
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .results li { display: block }

    .results li:first-child { margin-top: -1px }

    .results li:first-child:before, .search .results li:first-child:after {
        display: block;
        content: '';
        width: 0;
        height: 0;
        position: absolute;
        left: 50%;
        margin-left: -5px;
        border: 5px outset transparent;
    }

    .results li:first-child:before {
        border-bottom: 5px solid #c4c7d7;
        top: -11px;
    }

    .results li:first-child:after {
        border-bottom: 5px solid #fdfdfd;
        top: -10px;
    }

    .results li:first-child:hover:before, .search .results li:first-child:hover:after { display: none }

    .results li:last-child { margin-bottom: -1px }
    .results a {
        display: block;
        position: relative;
        width: 100%;
        margin: 0 -1px;
        padding: 6px 40px 6px 10px;
        color: #808394;
        font-weight: 500;
        text-shadow: 0 1px #fff;
        border: 1px solid transparent;
        border-radius: 3px;
    }

    .results a span { font-weight: 200 }

    .results a:before {
        content: '';
        width: 18px;
        height: 18px;
        position: absolute;
        top: 50%;
        right: 10px;
        margin-top: -9px;
        background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
    }

    .results a:hover {
        text-decoration: none;
        color: #fff !important;
        text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
        border-color: #2380dd #2179d5 #1a60aa;
        background-color: #338cdf;
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
        background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
        background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
        background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
        background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
        background-image: linear-gradient(top, #59aaf4, #338cdf);
        -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
        -moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
        -ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
        -o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
        box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
    }
    .results a span.listed:hover{
        color: #fff;
    }
    :-moz-placeholder {
        color: #a7aabc;
        font-weight: 200;
    }

    ::-webkit-input-placeholder {
        color: #a7aabc;
        font-weight: 200;
    }
    .wrap-table-shopping-cart{
        overflow: unset;
    }

    .order-cart-items{
        max-height: 60vh;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .order_items{
        max-height: 40vh;
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>