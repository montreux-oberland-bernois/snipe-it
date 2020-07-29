@include('hardware.components.header',['heading'=>'Etiquettes A7'])
@foreach ($assets as $asset)
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
            <td><img src="/uploads/{{ $snipeSettings->logo }}" class="image" width="60" style="display:inline;float:left;"/></td>
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
    <input name="ids[{{$asset->id}}]" type="hidden" value="{{$asset->id}}">
</div>
@endforeach
<input id="buttonentrylabel" type="submit" value="Entrée de stock" class="no-print">