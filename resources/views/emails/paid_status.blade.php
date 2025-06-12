<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Pembayaran</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f5f7fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f5f7fa; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr style="background-color: #2E86DE;">
                        <td style="padding: 20px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Status Pembayaran</h1>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="color: #333333;">Halo, {{ $data['user'] }}</h2>
                            <p style="color: #555555; font-size: 16px; line-height: 1.5;">
                                Terima kasih telah melakukan pembayaran. Berikut adalah detail status pembayaran Anda:
                            </p>

                            <table cellpadding="0" cellspacing="0" style="width: 100%; font-size: 15px; color: #555555; margin-top: 20px;">
                                <tr>
                                    <td style="padding: 8px 0;"><strong>Nomor Transaksi</strong></td>
                                    <td style="padding: 8px 0">:</td>
                                    <td style="padding: 8px 0;">{{ $data['transaction'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0;"><strong>Status:</strong></td>
                                    <td style="padding: 8px 0">:</td>
                                    <td style="padding: 8px 0;">{{ $data['status'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0;"><strong>Total Pembayaran</strong></td>
                                    <td style="padding: 8px 0">:</td>
                                    <td style="padding: 8px 0;">Rp{{ number_format($data['amount'], 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0;"><strong>Tanggal Pembayaran</strong></td>
                                    <td style="padding: 8px 0">:</td>
                                    <td style="padding: 8px 0;">{{ $data['payment_date'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0;"><strong>Metode Pembayaran</strong></td>
                                    <td style="padding: 8px 0">:</td>
                                    <td style="padding: 8px 0;">{{ $data['payment_method'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0;"><strong>Deskripsi</strong></td>
                                    <td style="padding: 8px 0">:</td>
                                    <td style="padding: 8px 0;">{{ $data['description'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0;"><strong>Channel</strong></td>
                                    <td style="padding: 8px 0">:</td>
                                    <td style="padding: 8px 0;">{{ $data['payment_channel'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0;"><strong>No. Bib</strong></td>
                                    <td style="padding: 8px 0">:</td>
                                    <td style="padding: 8px 0;">{{ $data['no_bib'] }}</td>
                                </tr>
                            </table>

                            <!-- Optional: CTA Button -->
                            @if ($data['status'] === 'PAID' && $data['slug'])
                                <div style="margin: 30px 0;">
                                    <a href="{{ route('show.event', $data['slug']) }}" style="background-color: #2E86DE; color: #ffffff; padding: 12px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                                        Lihat Detail di Dashboard
                                    </a>
                                </div>
                            @endif

                            <p style="color: #555555;">Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, silakan hubungi tim dukungan kami.</p>
                            <p style="color: #555555;">Terima kasih atas kepercayaan Anda.</p>
                            <p style="color: #555555;">Salam,<br><strong>Tim Kami</strong></p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f0f0f0; padding: 20px; font-size: 12px; color: #999999; text-align: center;">
                            Catatan: Email ini dikirim secara otomatis. Mohon tidak membalas email ini.<br>
                            Jika Anda tidak melakukan pembayaran ini, harap abaikan email ini.<br>
                            Untuk informasi lebih lanjut, kunjungi situs web kami.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
