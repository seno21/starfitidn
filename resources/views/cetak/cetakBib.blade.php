<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak BIB</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-image: url('{{ public_path('storage/' . $data->img_bib) }}');
            background-size: cover;
            background-position: center;
        }

        table {
            width: 100%;
            height: 100vh;
            border-collapse: collapse;
            padding: 40px;
            box-sizing: border-box;
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        .logo {
            max-height: 100px;
        }

        .event-name {
            font-size: 50px;
            font-weight: bold;
            text-align: right;
        }

        .no-bib {
            font-size: 300px;
            font-weight: bold;
            text-align: center;
        }

        .category,
        .participant-name {
            font-size: 60px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <!-- Baris 1: Logo & Nama Event -->
        <tr>
            <td width="10%">
                <img src="{{ public_path('storage/logo.png') }}" class="logo" alt="Logo">
            </td>
            <td class="event-name">
                {{ $data->event_name ?? 'Nama Event' }}
            </td>
        </tr>

        <!-- Baris 2: No BIB -->
        <tr>
            <td colspan="2" class="no-bib">
                {{ $data->no_bib }}
            </td>
        </tr>
        <tr>
            <td colspan="2" class="participant-name">
                {{ $data->name }}
            </td>
        </tr>
        <tr>
            <td colspan="2" class="category">
                {{ $data->kategori_lari ?? 'Kategori Lari' }}
            </td>
        </tr>
    </table>
</body>

</html>
