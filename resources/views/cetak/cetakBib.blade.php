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
            background-image: url('{{ public_path('storage/'.$image) }}');
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
            height: 40px;
        }

        .event-name {
            font-size: 30px;
            font-weight: bold;
            text-align: right;
        }

        .no-bib {
            font-size: 200px;
            font-weight: bold;
            text-align: center;
        }

        .category,
        .participant-name {
            font-size: 40px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    @foreach($listPeserta as $i => $data)
    <table @if (!$loop->last) style="page-break-after: always;" @endif>
        <tr>
            <td width="10%">
                <img src="{{ public_path('images/logo.png') }}" class="logo" alt="Logo">
            </td>
            <td class="event-name">
                {{ $data->nama_event ?? 'Nama Event' }}
            </td>
        </tr>

        <tr>
            <td colspan="2" class="no-bib">
                {{ $data->no_bib ?? $i }}
            </td>
        </tr>
        <tr>
            <td colspan="2" class="participant-name">
                {{ $data->name ?? 'Sample Name' }}
            </td>
        </tr>
        <tr>
            <td colspan="2" class="category">
                {{ $data->nama_kategori ?? 'Kategori Lari' }}
            </td>
        </tr>
    </table>
    @endforeach
</body>

</html>
