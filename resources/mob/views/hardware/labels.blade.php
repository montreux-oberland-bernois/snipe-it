<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Labels</title>

</head>
<body>

<?php
$settings->labels_width = $settings->labels_width - $settings->labels_display_sgutter;
$settings->labels_height = $settings->labels_height - $settings->labels_display_bgutter;
// Leave space on bottom for 1D barcode if necessary
$qr_size = ($settings->alt_barcode_enabled=='1') && ($settings->alt_barcode!='') ? $settings->labels_height - .3 : $settings->labels_height - .3;
?>

<style>
    body {
        font-family: arial, helvetica, sans-serif;
        font-size: 10px;
        display: block;
        margin: 0!important;
    }
    div {
        display: block;
    }
    table {
        height: 10.5mm;
        border-collapse: separate;
        box-sizing: border-box;
        text-align: start;
        border-spacing: 2px;
    }
    td {
        padding: 0 !important;
        vertical-align: top;
    }

    .page-break {
        page-break-after:always;
    }
    .asset_name {
        text-transform: lowercase;
        width: auto;
    }
    div.qr_img {
        float: left;
    }
    img.qr_img {
        height: 10mm;
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
    div.barcode_container {
        display: block;
        overflow: hidden;
    }
    @if ($snipeSettings->custom_css)
        {{ $snipeSettings->show_custom_css() }}
    @endif
    @page {
        margin: 0;
    }
</style>

@foreach ($assets as $asset)
    <?php $count++; ?>
    <div class="label">
        <table>
            <tr>
                <td rowspan="3">
                    @if ($settings->qr_code=='1')
                        <div class="qr_img">
                            <img src="./{{ $asset->id }}/qr_code" class="qr_img"/>
                        </div>
                    @endif
                    @if ((($settings->alt_barcode_enabled=='1') && $settings->alt_barcode!=''))
                        <div class="barcode_container">
                            <img src="./{{ $asset->id }}/barcode" class="barcode"/>
                        </div>
                    @endif
                </td>
                <td><img src="/uploads/{{ $snipeSettings->logo }}" width="60" style="display:inline;float:left;"/></td>
            </tr>
            <tr>
                <td>
                    <div class="qr_text">
                        @if ($settings->qr_text!='')
                            <div class="pull-left">
                                <strong>{{ $settings->qr_text }}</strong>
                                <br>
                            </div>
                        @endif
                        @if (($settings->labels_display_tag=='1') && ($asset->asset_tag!=''))
                            <div class="pull-left">
                                {{ $asset->asset_tag }}
                            </div>
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td class="asset_name">
                    @if (isset($asset->_snipeit_nom_du_pc_2) && ($asset->_snipeit_nom_du_pc_2!=''))
                        <div>
                            {{ $asset->_snipeit_nom_du_pc_2 }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
    </div>
@endforeach
<script type="text/javascript">
    window.print();
</script>
</body>
</html>