<html>
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('layout/incl/template2.css') }}">
  <script type="text/javascript" src="{{ asset('atlant/js/plugins/jquery/jquery.min.js') }}"></script>
  
</head>
<center>
    <div id="table_data">
      <center>
        <div id='dvData'>
          <table width=750px class='title'>
            <tr>
              <td class='tg' style="text-align: center;"><b>LAPORAN LABA</b></td>
            </tr>
          </table>
          <label class='control-label text-center'>Periode : {{$tgl1}} s/d {{$tgl2}}</label>
          @if($jumlah == 0)
            <h3><i>hasil pencarian : tidak ada satupun !!</i></h3>
          @else
          @php $total_laba = 0; @endphp
          <table width=1050px class='isi'>
            <tr>
              <td class='tg'><b>No Kwitansi</b></td>
              <td class='tg'><b>Tgl</b></td>
              <td class='tg'><b>Laba</b></td>
            </tr>
            <tbody id="loopingan_data">
              @foreach($data_laba as $datalaba)
                <tr>
                  <td  class='isi2'>{{$datalaba->nomor_invoice}}</td>
                  <td  class='isi2'>{{$datalaba->tanggal_penjualan}}</td>
                  <td  class='isi3'>{{display_currency($datalaba->vrekaplaba->laba)}}</td>
                </tr>
                @php $total_laba += $datalaba->vrekaplaba->laba; @endphp
              @endforeach
            </tbody>
            <tbody>
              <tr>
                <td class='isi2' colspan=2><b>TOTAL (Rp) :</b></td>
                <td class='isi3'><b id="totalnya">{{display_currency($total_laba)}}</b></td>
              </tr>
            </tbody>
          </table>
          @endif
    </div>
    <!-- <table style="width:860px" class="title"><tr><td class="tg"><b>LAPORAN BULANAN KLINIK</b></td></tr></table><br /> -->
    <div id="prop">
      
    </div>    
  <form>
    <input type="button" value='cetak laporan' onclick="window.print()"/>
    <input type="button" id="btnExport" value=" Export ke Excel " />
  </form>
</center>
<script type="text/javascript">
  function addCommas(nStr)
  {
      nStr += '';
      x = nStr.split(',');
      x1 = x[0];
      x2 = x.length > 1 ? ',' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
          x1 = x1.replace(rgx, '$1' + '.' + '$2');
      }
      return x1 + x2;
  }
</script>
<script type="text/JavaScript">
  $(document).ready(function(){
    $("#btnExport").click(function(e) {
      window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html().replace(/\./gi,"")));
      e.preventDefault();
    });
  });
</script>
</html>