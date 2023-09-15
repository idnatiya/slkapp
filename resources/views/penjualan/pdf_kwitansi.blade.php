<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Email Receipt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
  /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
  @media screen {
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
    }

    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
    }
  }

  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }

  /**
   * Remove extra space added to tables and cells in Outlook.
   */
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;
  }

  /**
   * Better fluid images in Internet Explorer.
   */
  img {
    -ms-interpolation-mode: bicubic;
  }

  /**
   * Remove blue links for iOS devices.
   */
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }

  /**
   * Fix centering issues in Android 4.4.
   */
  div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  }

  body {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }

  /**
   * Collapse table borders to avoid space between cells.
   */
  table {
    border-collapse: collapse !important;
  }

  a {
    color: #1a82e2;
  }

  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }

  .judul_thead{
    padding: 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;
  }
  .item_barang{
    padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;text-align: left;
  }
  .item_angka{
    padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;text-align: right;
  }
  </style>

</head>
<body>


  <!-- start body -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- start hero -->
    <tr>
      <td align="center">
        <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr>
            <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;">
              <h3><img src="{{ public_path('images/' . $konfigurasi->getConfig('logo_kwitansi')) }}" style="max-height: 70px;max-width: 70px;"></h3>
            </td>
            <td align="right" bgcolor="#ffffff" style="padding: 36px 24px 0;font-size: 11px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;">
              {!! $konfigurasi->getConfig('alamat_kwitansi') !!}
            </td>
          </tr>
        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end hero -->
    <tr style="font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
        <td align="center">
            <p>NOMOR KWINTANSI : {{ $penjualan->nomor_invoice }}</p>
        </td>
    </tr>
    <tr style="font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
        <td align="center">
            <p>NAMA : {{ $penjualan->nama_pembeli }}</p>
        </td>
    </tr>

    <!-- start copy block -->
    <tr>
      <td align="center">
        <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">


          <!-- start receipt table -->
          <tr>
            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td align="left" bgcolor="grey" width="75%" class="judul_thead"><strong>Item</strong></td>
                  <td align="left" bgcolor="grey" width="75%" class="judul_thead"><strong></strong></td>
                  <td align="right" bgcolor="grey" width="75%" class="judul_thead"><strong>Diskon</strong></td>
                  <td align="right" bgcolor="grey" width="25%" class="judul_thead"><strong>Total</strong></td>
                </tr>
                @php 
                $total_diskon = 0; 
                $total_harga = 0; 
                @endphp 
                @foreach ($penjualan->items as $item)
                <tr>
                  <td width="75%" class="item_barang">{{ $item->namaBarang }}</td>
                  <td width="75%" class="item_angka">{{ display_currency($item->harga_jual) }} x {{ $item->qty }}</td>
                  <td width="75%" class="item_angka">{{ display_currency($item->diskon) }}</td>
                  <td width="25%" class="item_angka">{{ display_currency($item->total) }}</td>
                  @php 
                    $total_diskon += $item->diskon; 
                    $total_harga += $item->total; 
                  @endphp 
                </tr>
                @endforeach 
                
                <!-- BATAS ATAS -->
                <tr>
                    <td align="left" width="75%" colspan="4" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 2px dashed #D2C7BA;"></td>
                </tr>
                <!-- END BATAS ATAS -->
                <tr>
                  <td width="75%" colspan="2" class="item_barang"><strong>Total</strong></td>
                  <td width="25%" class="item_angka"><strong>{{ display_currency($total_diskon) }}</strong></td>
                  <td width="25%" class="item_angka"><strong>{{ display_currency($total_harga) }}</strong></td>
                </tr>
                <tr>
                  <td width="75%" colspan="3" class="item_barang"><strong>Pembayaran (Tunai)</strong></td>
                  <td align="right" width="25%" class="item_angka"><strong>{{ display_currency($penjualan->tunai) }}</strong></td>
                </tr>

                @php 
                $kembalian = $penjualan->tunai - $total_harga; 
                @endphp 

                <tr>  
                  <td width="75%" colspan="3" class="item_barang"><strong>Kembalian</strong></td>
                  <td align="right" width="25%" class="item_angka"><strong>{{ display_currency($kembalian) }}</strong></td>
                </tr>
                <!-- BATAS BAWAH -->
                <tr>
                    <td align="left" width="75%" colspan="4" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 2px dashed #D2C7BA;"></td>
                </tr>
                <!-- END BATAS BAWAH -->
                <tr>
                    <td align="center" colspan="4">
                        <p>Terima Kasih</p>
                    </td>
                </tr>


              </table>
            </td>
          </tr>
          <!-- end reeipt table -->

        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end copy block -->

  </table>
  <!-- end body -->

</body>
</html>