@include('hardware.components.header',['heading'=>'Entrées de stock'])
@foreach ($assets as $asset)
<div class="label">
    <table class="entrylabel">
        <tr>
            <td rowspan="4">
                @if ($settings->qr_code=='1')
                    <div class="qr_img_entry">
                        <img src="./{{ $asset->id }}/qr_code" class="qr_img_entry"/>
                    </div>
                @endif
            </td>
            <td><img src="/uploads/{{ $snipeSettings->logo }}" class="image" width="130" style="display:inline;float:left;"/></td>
        </tr>
        <tr>
            <td>
                <div class="qr_text_entry">
                    @if (isset($settings->labels_display_tag) && ($asset->asset_tag!=''))
                        <div class="pull-left">
                            {{ $asset->asset_tag }}
                        </div>
                    @endif
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="model_name_entry">
                    @if (isset($settings->labels_display_model) && ($asset->model->name!=''))
                        <div class="pull-left">
                            {{ $asset->model->name }}
                        </div>
                    @endif
                </div>
            </td>
        </tr>
        <tr>
            <td>
                @if (isset($settings->labels_display_serial) && ($asset->serial!=''))
                    <div class="pull-left">
                       SN: {{ $asset->serial }}
                    </div>
                @endif
            </td>
        </tr>
    </table>
    <input name="ids[{{$asset->id}}]" type="hidden" value="{{$asset->id}}">
</div>
@endforeach
<input id=buttonA7label type="submit" value="Etiquette A7" formaction="?label=default" class="no-print">
