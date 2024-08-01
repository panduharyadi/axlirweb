@extends('emails.Layouts')

@section('content')
    <center style="width: 100%; background-color: #f1f1f1;">
        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                <tr>
                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="logo" style="text-align: left;">
                                    <h1><a href="#">Axlir</a></h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" class="hero bg_white" style="padding: 2em 0;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 0 2.5em; text-align: left;">
                                    <div class="text">
                                        <h3>Halo {{ $data['pemesan'] }},</h3>
                                        <p style="font-size: 12px; font-weight: 200; color: #000;">Transaksi kamu telah kami terima dan siap kami proses. Silahkan kirim bukti transfer ke (nomor penjual).</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <table class="bg_white" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                            <th width="50%" style="text-align: left; padding: 0 2.5em; color: #000; padding-bottom: 20px">Item</th>
                            <th width="50%" style="text-align: right; padding: 0 2.5em; color: #000; padding-bottom: 20px">Price</th>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                            <td valign="middle" width="60%" style="text-align: left; padding: 0 2.5em;">
                                <div class="product-entry">
                                    <div class="text">
                                        <p style="font-size: 14px;">{{ $data['pesanan'] }}</p>
                                        <span style="font-size: 12px;">{{ $data['ukuran'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td valign="middle" width="20%" style="text-align: left; padding: 0 2.5em;">
                                <span style="color: #000; font-size: 12px;">@currency($data['harga'])</span>
                            </td>
                        </tr>
                    </table>
                </tr>
            </table>
            
            {{-- footer --}}
            @include('emails.components.footer')
        </div>
    </center>
@endsection