<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Labels</title>
</head>
<body>
<style>
    body {
        font-family: arial, helvetica, sans-serif;
        display: block;
        margin: 0!important;
        font-size: 14px;
    }
    div {
        display: block;
    }
    h1 {
        color: white;
        margin: 0;
        text-align: center;
        height: 50px;
        font-size: 20px;
        font-weight: 300;
        line-height: 50px;
    }
    table {
        height: 10mm;
        border-collapse: separate;
        box-sizing: border-box;
        text-align: start;
        border-spacing: 2px;
    }
    header {
        max-height: 150px;
        position: relative;
        background: #3c8dbc;
    }
    .close {
        position: absolute;
        top: 4px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        cursor: pointer;
    }
    .entrylabel {
        padding : 4px;
        height: 27.3mm !important;
    }
    td {
        padding: 0 !important;
        vertical-align: top;
    }
    tr{
        padding: 0 !important;
    }

    .page-break {
        page-break-after:always;
    }
    .asset_name {
        text-transform: lowercase;
        font-size: 10px;
        width: auto;
    }
    .image {
        -webkit-filter: brightness(100%); /* Safari 6.0 - 9.0 */
        filter: brightness(0%);
        padding-top: 2px;
    }
    div.qr_img {
        float: left;
        height: 10mm;
    }
    img.qr_img {
        height: 10mm;
        padding-top: 2px;
    }
    img.qr_img_entry {
        height: 24mm;
        vertical-align: center;
    }
    img.barcode_entry {
        display:block;
        height: 24mm;
    }
    img.barcode {
    display:block;
    height: 10mm;
    }
    .qr_text {
        font-family: arial, helvetica, sans-serif;
        font-size: 10px;
        overflow: hidden !important;
        display: block;
        word-wrap: break-word;
        word-break: break-all;
    }
    .qr_text_entry .model_name_entry {
        font-family: arial, helvetica, sans-serif;
        font-size: 14px !important;
        overflow: hidden !important;
        display: block;
        word-wrap: break-word;
        word-break: break-all;
    }
    div.barcode_container {
        display: block;
        overflow: hidden;
    }
    #buttonentrylabel, #buttonA7label {
        background-color: #307095;
        border-color: #23536f;
        color: #fff;
        padding: 6px 12px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 3px;
        border: 1px solid transparent;
        margin-left: 4px;
    }
    #buttonprint {
        background-color: #d81b60;
        border-color: #23536f;
        color: #fff;
        padding: 6px 12px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 3px;
        border: 1px solid transparent;
    }
    @media print {
        .no-print {
            display: none !important;
        }
    }
    @if ($snipeSettings->custom_css)
        {{ $snipeSettings->show_custom_css() }}
    @endif
    @page {
        margin: 0;
    }
</style>
<form action="?label=entry" method="post">
    <input name="_token" type="hidden" value="{{ htmlentities($_POST['_token'], ENT_QUOTES, "UTF-8") }}">
    <input name="bulk_actions" type="hidden" value="labels">
    <input name="search" type="hidden" value="">
    <input name="btSelectItem" type="hidden" value="on">

        @if (isset($_GET['label']) && $_GET['label'] == 'entry')
            @include('hardware.entry')
        @else
            @include('hardware.device')
        @endif
    <button class="no-print" id="buttonprint" type="button">Imprimer</button>
</form>
<script>
    let print = document.querySelector("#buttonprint");
    print.onclick=function(){
        window.print();
    }
</script>
</body>
</html>