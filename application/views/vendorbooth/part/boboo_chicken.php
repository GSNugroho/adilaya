<form id="rincicek">
<table class="table table-bordered">
    <tr>    
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr>
        <td>BOOTH PUTIH</td>
        <td align="center">1</td>
        <td><p id="bochi_booth_putih"></p></td>
    </tr>
    <tr>
        <td>ROLL BANNER</td>
        <td align="center">1</td>
        <td><p id="bochi_roll_ban"></p></td>
    </tr>
    <tr id="boboo_tenda" style="display: none;">
        <td>TENDA</td>
        <td align="center">1</td>
        <td><p id="bochi_tenda"></p></td>
    </tr>
    <tr>
        <td>STICKER</td>
        <td align="center">1</td>
        <td><p id="bochi_sticker"></p></td>
    </tr>
    <tr>
        <td>DEEP FRYER GAS</td>
        <td align="center">1</td>
        <td><p id="bochi_deep_gas"></p></td>
    </tr>
    <tr>
        <td>DEEP FRYER LISTRIK</td>
        <td align="center">1</td>
        <td><p id="bochi_deep_lis"></p></td>
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="bochi_se_reg"></p></td>
    </tr>
    <tr>
        <td>GAS TORCH</td>
        <td align="center">1</td>
        <td><p id="bochi_gast"></p></td>
    </tr>
    <tr>
        <td>BOTOL SAUS</td>
        <td align="center">3</td>
        <td><p id="bochi_btoksa"></p></td>
    </tr>
    <tr>
        <td>BOTOL BUMBU TABUR KACA</td>
        <td align="center">3</td>
        <td><p id="bochi_btol_kc"></p></td>
    </tr>
    <tr>
        <td>ICE BOX</td>
        <td align="center">1</td>
        <td><p id="bochi_boxes"></p></td>
    </tr>
    <tr>
        <td>TALENAN</td>
        <td align="center">1</td>
        <td><p id="bochi_telenan"></p></td>
    </tr>
    <tr>
        <td>CAPITAN/ PINSET</td>
        <td align="center">1</td>
        <td><p id="bochi_capitan"></p></td>
    </tr>
    <tr>
        <td>WADAH TEPUNG KERING</td>
        <td align="center">1</td>
        <td><p id="bochi_wtk"></p></td>
    </tr>
    <tr>
        <td>WADAH TEPUNG BASAH</td>
        <td align="center">1</td>
        <td><p id="bochi_wtb"></p></td>
    </tr>
    <tr>
        <td>BASKOM DAGING</td>
        <td align="center">1</td>
        <td><p id="bochi_basdag"></p></td>
    </tr>
    <tr>
        <td>TIMBANGAN</td>
        <td align="center">1</td>
        <td><p id="bochi_timbangan"></p></td>
    </tr>
    <tr>
        <td>TOPLES MOZARELLA</td>
        <td align="center">1</td>
        <td><p id="bochi_top_moz"></p></td>
    </tr>
    <tr>
        <td>GELAS TAKAR 500ML</td>
        <td align="center">1</td>
        <td><p id="bochi_getak"></p></td>
    </tr>
    <tr>
        <td>SERAGAM (HITAM)</td>
        <td align="center">2</td>
        <td><p id="bochi_seragam"></p></td>
    </tr>
    <tr>
        <td>PARUTAN KEJU</td>
        <td align="center">1</td>
        <td><p id="bochi_par_kej"></p></td>
    </tr>
    <tr>
        <td>KANEBO</td>
        <td align="center">1</td>
        <td><p id="bochi_kanebo"></p></td>
    </tr>
    <tr>
        <td>SERBET</td>
        <td align="center">2</td>
        <td><p id="bochi_serbet"></p></td>
    </tr>
    <tr>
        <td>PISAU FILLET</td>
        <td align="center">1</td>
        <td><p id="bochi_pisf"></p></td>
    </tr>
    <tr>
        <td>SENDOK</td>
        <td align="center">1</td>
        <td><p id="bochi_sendok"></p></td>
    </tr>
    <tr>
        <td>HANDGLOVES</td>
        <td align="center">1</td>
        <td><p id="bochi_hand_glo"></p></td>
    </tr>
    <tr>
        <td>TUSUKAN SATE</td>
        <td align="center">1</td>
        <td><p id="bochi_tusuks"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="bochi_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="bochi_id_ca"></p></td>
    </tr>
    <tr>
        <td>RAFIA LAKBAN</td>
        <td align="center">1</td>
        <td><p id="bochi_ra_la"></p></td>
    </tr>
    <tr>
        <td>KARDUS</td>
        <td align="center">4</td>
        <td><p id="bochi_kardus"></p></td>
    </tr>
    <tr>
        <td>CELEMEK (HITAM)</td>
        <td align="center">2</td>
        <td><p id="bochi_clemek"></p></td>
    </tr>
    <tr>
        <td>LAMPU SET</td>
        <td align="center">1</td>
        <td><p id="bochi_la_set"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rincianboboochicken').style.display != 'none'){
    if($('#bochi_booth_putih').is(':checked')){
        var booth_putih = 1
    }else{
        var booth_putih = 0
    }
    if($('#bochi_roll_ban').is(':checked')){
        var roll_banner = 1
    }else{
        var roll_banner = 0
    }
    if($('#bochi_tenda').is(':checked')){
        var tenda = 1
    }else{
        var tenda = 0
    }
    if($('#bochi_sticker').is(':checked')){
        var sticker = 1
    }else{
        var sticker = 0
    }
    if($('#bochi_deep_gas').is(':checked')){
        var deep_gas = 1
    }else{
        var deep_gas = 0
    }
    if($('#bochi_deep_lis').is(':checked')){
        var deep_lis = 1
    }else{
        var deep_lis = 0
    }
    if($('#bochi_se_reg').is(':checked')){
        var selreg = 1
    }else{
        var selreg = 0
    }
    if($('#bochi_gast').is(':checked')){
        var gastro = 1
    }else{
        var gastro = 0
    }
    if($('#bochi_btoksa').is(':checked')){
        var botsus = 1
    }else{
        var botsus = 0
    }
    if($('#bochi_btol_kc').is(':checked')){
        var botkac = 1
    }else{
        var botkac = 0
    }
    if($('#bochi_boxes').is(':checked')){
        var icebox = 1
    }else{
        var icebox = 0
    }
    if($('#bochi_telenan').is(':checked')){
        var talenan = 1
    }else{
        var talenan = 0
    }
    if($('#bochi_capitan').is(':checked')){
        var capitan = 1
    }else{
        var capitan = 0
    }
    if($('#bochi_wtk').is(':checked')){
        var wd_tp_kering = 1
    }else{
        var wd_tp_kering = 0
    }
    if($('#bochi_wtb').is(':checked')){
        var wd_tp_basah = 1
    }else{
        var wd_tp_basah = 0
    }
    if($('#bochi_basdag').is(':checked')){
        var bas_dag = 1
    }else{
        var bas_dag = 0
    }
    if($('#bochi_timbangan').is(':checked')){
        var timbangan = 1
    }else{
        var timbangan = 0
    }
    if($('#bochi_top_moz').is(':checked')){
        var top_moz = 1
    }else{
        var top_moz = 0
    }
    if($('#bochi_getak').is(':checked')){
        var gel_takar = 1
    }else{
        var gel_takar = 0
    }
    if($('#bochi_seragam').is(':checked')){
        var seragam = 1
    }else{
        var seragam = 0
    }
    if($('#bochi_par_kej').is(':checked')){
        var parut_kej = 1
    }else{
        var parut_kej = 0
    }
    if($('#bochi_kanebo').is(':checked')){
        var kanebo = 1
    }else{
        var kanebo = 0
    }
    if($('#bochi_serbet').is(':checked')){
        var serbet = 1
    }else{
        var serbet = 0
    }
    if($('#bochi_pisf').is(':checked')){
        var pisau_f = 1
    }else{
        var pisau_f = 0
    }
    if($('#bochi_sendok').is(':checked')){
        var sendok = 1
    }else{
        var sendok = 0
    }
    if($('#bochi_hand_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#bochi_tusuks').is(':checked')){
        var tusuk_sate = 1
    }else{
        var tusuk_sate = 0
    }
    if($('#bochi_sukon').is(':checked')){
        var sur_kon = 1
    }else{
        var sur_kon = 0
    }
    if($('#bochi_id_ca').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }
    if($('#bochi_ra_la').is(':checked')){
        var rafia_lakban = 1
    }else{
        var rafia_lakban = 0
    }
    if($('#bochi_kardus').is(':checked')){
        var kardus = 1
    }else{
        var kardus = 0
    }
    if($('#bochi_clemek').is(':checked')){
        var cel_hit = 1
    }else{
        var cel_hit = 0
    }
    if($('#bochi_la_set').is(':checked')){
        var lam_set = 1
    }else{
        var lam_set = 0
    }
    var dataString = 'booth_putih='+booth_putih
    +'&roll_banner='+roll_banner
    +'&tenda='+tenda
    +'&sticker='+sticker
    +'&deep_gas='+deep_gas
    +'&deep_lis='+deep_lis
    +'&selreg='+selreg
    +'&gastro='+gastro
    +'&botsus='+botsus
    +'&botkac='+botkac
    +'&icebox='+icebox
    +'&talenan='+talenan
    +'&capitan='+capitan
    +'&wd_tp_kering='+wd_tp_kering
    +'&wd_tp_basah='+wd_tp_basah
    +'&bas_dag='+bas_dag
    +'&timbangan='+timbangan
    +'&top_moz='+top_moz
    +'&gel_takar='+gel_takar
    +'&seragam='+seragam
    +'&parut_kej='+parut_kej
    +'&kanebo='+kanebo
    +'&serbet='+serbet
    +'&pisau_f='+pisau_f
    +'&sendok='+sendok
    +'&hand_glo='+hand_glo
    +'&tusuk_sate='+tusuk_sate
    +'&sur_kon='+sur_kon
    +'&idcard='+idcard
    +'&rafia_lakban='+rafia_lakban
    +'&kardus='+kardus
    +'&cel_hit='+cel_hit
    +'&lam_set='+lam_set
}
</script>