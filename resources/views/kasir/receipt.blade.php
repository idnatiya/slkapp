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
              <h3><img style="max-height: 70px;max-width: 70px;" src="data:image/jpeg;base64,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"></h3>
            </td>
            <td align="right" bgcolor="#ffffff" style="padding: 36px 24px 0;font-size: 11px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
              consectetur adipisicing elit, sed do eiusmod<br>
              adipisicing elit, sed do eiusmod<br>
              sed do eiusmod<br>

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
    <tr>
        <td align="center">
            <p>NO KWIT</p>
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
                <tr>
                  <td width="75%" class="item_barang">Gear Set</td>
                  <td width="75%" class="item_angka">25.000 x 2</td>
                  <td width="75%" class="item_angka">10.000</td>
                  <td width="25%" class="item_angka">40.000</td>
                </tr>
                <tr>
                  <td width="75%" class="item_barang">Clutch Set</td>
                  <td width="75%" class="item_angka">65.000 x 2</td>
                  <td width="75%" class="item_angka">100.000</td>
                  <td width="25%" class="item_angka">30.000</td>
                </tr>
                <!-- BATAS ATAS -->
                <tr>
                    <td align="left" width="75%" colspan="4" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 2px dashed #D2C7BA;"></td>
                </tr>
                <!-- END BATAS ATAS -->
                <tr>
                  <td width="75%" colspan="2" class="item_barang"><strong>Total</strong></td>
                  <td width="25%" class="item_angka"><strong>110.000</strong></td>
                  <td width="25%" class="item_angka"><strong>70.000</strong></td>
                </tr>
                <tr>
                  <td width="75%" colspan="3" class="item_barang"><strong>Pembayaran (Tunai)</strong></td>
                  <td align="right" width="25%" class="item_angka"><strong>100.000</strong></td>
                </tr>

                <tr>
                  <td width="75%" colspan="3" class="item_barang"><strong>Kembalian</strong></td>
                  <td align="right" width="25%" class="item_angka"><strong>30.000</strong></td>
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