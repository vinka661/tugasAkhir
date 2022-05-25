<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Progres</title>
        <style>

            * {
                font-family: Arial, Helvetica, sans-serif;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
                color: inherit;
                font-size: 1.5rem;
            }
            
            .pr-5, .px-5 {
                padding-right: 3rem !important;
            }

            table {
                border-collapse: collapse;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                background-color: transparent;
            }

            .table th,
            .table td {
                /* padding: 0.3rem; */
                vertical-align: top;
                border-top: 1px solid #dee2e6;
                text-align: left;
                font-size: 7.2px;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .table tbody + tbody {
                border-top: 2px solid #dee2e6;
            }

            .table {
                border-collapse: collapse !important;
            }
            
            .table td,
            .table th {
                background-color: #ffffff !important;
            }

            .table-bordered {
                border: 1px solid #dee2e6;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
            }

            .table-bordered thead th,
            .table-bordered thead td {
                border-bottom-width: 2px;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6 !important;
            }
        </style>
    </head>

    <body>
        <center>
            <h2>DATA LAPORAN</h2>
            <h3>PERKEMBANGAN GIZI BAYI/BALITA </h3>
        </center>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Posyandu</th>
                    <th>Kader</th>
                    <th>Bayi/Balita</th>
                    <th>BB</th>
                    <th>TB</th>
                    <th>LK</th>
                    <th>Status Gizi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $key => $data)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $data->tgl_timbang }}</td>
                        <td>{{ $data->nama_posyandu }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->nama_bayi }}</td>
                        <td>{{ $data->berat_badan }}</td>
                        <td>{{ $data->tinggi_badan }}</td>
                        <td>
                            @if ($data->lingkar_kepala == NULL)
                                -
                            @else
                                {{ $data->lingkar_kepala }}
                            @endif
                        </td>
                        <td>{{ $data->status_gizi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>