<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details</title>
</head>

<body>
    <h1>Report Details</h1>
    <p><strong>Destination:</strong> {{ $report->destination->name }}</p>
    <p><strong>License Plate:</strong> {{ $report->license_plate }}</p>
    <p><strong>Surat Jalan:</strong> {{ $report->surat_jalan }}</p>
    <h2>Waste Details:</h2>
    <ul>
        @foreach ($report->details as $detail)
            <li>{{ $detail->limbah->name }}: {{ $detail->qty }} {{ $detail->unit }}</li>
        @endforeach
    </ul>
</body>

</html>
