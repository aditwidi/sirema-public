<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemberitahuan Akun Anda</title>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: auto;">
        <tr>
            <td style="background-color: #3D5EE1; color: #ffffff; text-align: center; padding: 10px;">
                <h1 style="margin: 0; font-size: 24px;">Pemberitahuan Akun Anda</h1>
            </td>
        </tr>
        <tr>
            <td style="background-color: #ffffff; padding: 20px;">
                <p style="font-size: 16px; color: #333333;">Halo <strong>{{$user['name']}}</strong>!</p>
                <p style="font-size: 16px; color: #333333;">Berikut ini adalah data anda:</p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 16px; color: #333333;">
                    <tr>
                        <td style="padding: 5px 0;">Nama Lengkap</td>
                        <td style="padding: 5px 10px;">:</td>
                        <td style="padding: 5px 0;">{{$user['name']}}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px 0;">Email</td>
                        <td style="padding: 5px 10px;">:</td>
                        <td style="padding: 5px 0;">{{$user['email']}}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px 0;">Role</td>
                        <td style="padding: 5px 10px;">:</td>
                        <td style="padding: 5px 0;">{{$user['role']}}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px 0;">Divisi</td>
                        <td style="padding: 5px 10px;">:</td>
                        <td style="padding: 5px 0;">{{$user['divisi']}}</td>
                    </tr>
                </table>
                {{-- <div style="text-align: center; margin: 20px 0;">
                    <a href="{{$details['url']}}" style="background-color: #28a745; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 18px; font-weight: bold;">Verifikasi Akun</a>
                </div> --}}
            </td>
        </tr>
        <tr>
            <td style="background-color: #f4f4f4; text-align: center; padding: 10px; font-size: 16px; color: #333333;">
                Copyright @ 2023 | Sirema
            </td>
        </tr>
    </table>
</body>
</html>
