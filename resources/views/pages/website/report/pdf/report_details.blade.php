<!DOCTYPE html>
<html>

<head>
    <title>Report Details</title>
</head>

<body>
    <h1>Report Details</h1>
    <p><strong>Nomor Surat Jalan:</strong> {{ $report->surat_jalan }}</p>
    <p><strong>Destination:</strong> {{ $report->destination->name }}</p>
    <p><strong>Status:</strong> {{ $report->status }}</p>

    <h3>Details</h3>
    <ul>
        @foreach ($report->details as $detail)
            <li>
                <strong>{{ $detail->limbah->name }}</strong>
                ({{ $detail->qty }} {{ $detail->unit }})
                -
                {{ $detail->desc ?? 'N/A' }}
            </li>
        @endforeach
    </ul>
</body>

</html>
