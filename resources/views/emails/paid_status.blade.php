<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Status Pembayaran</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
  <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f3f4f6; padding: 40px 0;">
    <tr>
      <td align="center">
        <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="background: #ffffff; border-radius: 8px; box-shadow: 0 0 12px rgba(0, 0, 0, 0.08); overflow: hidden;">
          <!-- Header -->
          <tr>
            <td align="center" style="background-color: #1d4ed8; padding: 30px 20px;">
              <h1 style="color: #ffffff; font-size: 24px; margin: 0;">💳 Konfirmasi Pembayaran</h1>
            </td>
          </tr>

          <!-- Content -->
          <tr>
            <td style="padding: 30px;">
              <h2 style="margin-top: 0; color: #111827;">Halo, {{ $data['user'] }}</h2>
              <p style="color: #374151; font-size: 16px; line-height: 1.6;">
                Terima kasih telah melakukan pembayaran. Berikut adalah detail status pembayaran Anda:
              </p>

              <table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px; font-size: 15px; color: #374151;">
                @php
                    $rows = [
                        'Nomor Transaksi' => $data['transaction'],
                        'Status' => $data['status'],
                        'Total Pembayaran' => 'Rp' . number_format($data['amount'], 0, ',', '.'),
                        'Tanggal Pembayaran' => $data['payment_date'],
                        'Metode Pembayaran' => $data['payment_method'],
                        'Deskripsi' => $data['description'],
                        'Channel' => $data['payment_channel'],
                        'No. BIB' => $data['no_bib'],
                    ];
                @endphp

                @foreach ($rows as $label => $value)
                <tr>
                  <td style="padding: 8px 0; width: 45%;"><strong>{{ $label }}</strong></td>
                  <td style="padding: 8px 0; width: 5%;">:</td>
                  <td style="padding: 8px 0;">{{ $value }}</td>
                </tr>
                @endforeach
              </table>

              @if ($data['status'] === 'PAID' && $data['slug'])
              <div style="margin-top: 30px; text-align: center;">
                <a href="{{ route('show.event', $data['slug']) }}" style="background-color: #1d4ed8; color: #ffffff; text-decoration: none; padding: 12px 24px; font-size: 16px; border-radius: 5px; display: inline-block;">
                  📄 Lihat Detail di Dashboard
                </a>
              </div>
              @endif

              <p style="margin-top: 30px; color: #6b7280; font-size: 14px;">
                Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, silakan hubungi tim dukungan kami.<br />
                Terima kasih atas kepercayaan Anda.
              </p>

              <p style="color: #374151; font-size: 14px;">Salam,<br><strong>STARFIT Indonesia</strong></p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color: #e5e7eb; padding: 20px; text-align: center; font-size: 12px; color: #6b7280;">
              Catatan: Email ini dikirim secara otomatis. Mohon tidak membalas email ini.<br />
              Jika Anda tidak melakukan pembayaran ini, harap abaikan email ini.<br />
              Untuk informasi lebih lanjut, kunjungi situs web kami.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
