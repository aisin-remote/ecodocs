<table>
    <thead>
        <tr>
            <th colspan="6" style="text-align: center; font-weight: bold; font-size: 16px;">Waste Report Ecodocs</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3">Destination: {{ $report->destination->name ?? '-' }}</td>
            <td colspan="3">License Plate: {{ $report->license_plate ?? '-' }}</td>
        </tr>
        <tr>
            <td colspan="3">Report ID: {{ $report->id ?? '-' }}</td>
            <td colspan="3">Date: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Waste</th>
            <th>Qty</th>
            <th>Unit</th>
            <th>Description</th>
        </tr>
        @foreach ($report->details as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail->limbah->code ?? '-' }}</td>
                <td>{{ $detail->limbah->name ?? '-' }}</td>
                <td>{{ $detail->qty ?? 0 }}</td>
                <td>{{ $detail->unit ?? '-' }}</td>
                <td>{{ $detail->description ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
