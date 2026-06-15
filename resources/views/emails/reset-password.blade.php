<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Desa Hargorojo</title>
</head>
<body style="margin:0; padding:0; background:#f4f1ea; font-family:Arial, Helvetica, sans-serif; color:#173121;">
    <div style="display:none; max-height:0; overflow:hidden; opacity:0;">
        Permintaan reset password akun Desa Hargorojo.
    </div>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f1ea; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:560px; overflow:hidden; border-radius:24px; background:#ffffff; border:1px solid #e5ddcd; box-shadow:0 18px 48px rgba(23,49,33,0.10);">
                    <tr>
                        <td style="padding:30px 32px; background:#173121;">
                            <p style="margin:0 0 8px 0; color:#d8b15a; font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase;">
                                Desa Hargorojo
                            </p>
                            <h1 style="margin:0; color:#ffffff; font-size:28px; line-height:1.25; font-weight:800;">
                                Reset Password Akun
                            </h1>
                            <p style="margin:10px 0 0 0; color:#d8e2db; font-size:14px; line-height:1.6;">
                                Portal Agroeduwisata dan Produk Desa Hargorojo
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:28px 32px 0 32px;">
                            <p style="margin:0 0 16px 0; color:#1f3328; font-size:16px; line-height:1.65;">
                                Halo, <strong>{{ $name }}</strong>.
                            </p>
                            <p style="margin:0 0 16px 0; color:#425047; font-size:15px; line-height:1.7;">
                                Kami menerima permintaan untuk mereset password akun Anda di portal Desa Hargorojo.
                                Klik tombol di bawah ini untuk membuat password baru.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:10px 32px 24px 32px;">
                            <a
                                href="{{ $url }}"
                                style="display:inline-block; border-radius:999px; background:#173121; color:#ffffff; font-size:14px; font-weight:700; text-decoration:none; padding:14px 28px;"
                            >
                                Reset Password
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0 32px 22px 32px;">
                            <div style="border-radius:18px; background:#f8f6f1; border:1px solid #ece6da; padding:16px 18px;">
                                <p style="margin:0 0 8px 0; color:#173121; font-size:14px; line-height:1.6; font-weight:700;">
                                    Tautan berlaku {{ $expireMinutes }} menit.
                                </p>
                                <p style="margin:0; color:#5d695f; font-size:13px; line-height:1.7;">
                                    Jika Anda tidak meminta reset password, abaikan email ini. Akun Anda tetap aman selama link ini tidak digunakan.
                                </p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0 32px 28px 32px;">
                            <p style="margin:0 0 12px 0; color:#425047; font-size:14px; line-height:1.7;">
                                Jika tombol tidak bisa dibuka, salin tautan berikut ke browser Anda:
                            </p>
                            <p style="margin:0; word-break:break-all; color:#173121; font-size:12px; line-height:1.7;">
                                <a href="{{ $url }}" style="color:#0b6b57; text-decoration:underline;">{{ $url }}</a>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:20px 32px; background:#173121;">
                            <p style="margin:0; color:#ffffff; font-size:14px; line-height:1.6; font-weight:700;">
                                Salam hangat,<br>Admin Desa Hargorojo
                            </p>
                            <p style="margin:10px 0 0 0; color:#d8b15a; font-size:12px; line-height:1.6;">
                                Portal Agroeduwisata dan Produk Desa Hargorojo
                            </p>
                        </td>
                    </tr>
                </table>

                <p style="margin:18px 0 0 0; color:#82796c; font-size:12px; line-height:1.6;">
                    © {{ date('Y') }} Desa Hargorojo. Semua hak dilindungi.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
