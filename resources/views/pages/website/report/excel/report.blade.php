<table>
    <thead>
        <tr>
            <th>Destination</th>
            <th>License Plate</th>
            <th>Surat Jalan</th>
            <th>Waste Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $report->destination->name }}</td>
            <td>{{ $report->license_plate }}</td>
            <td>{{ $report->surat_jalan }}</td>
            <td>
                <ul>
                    @foreach ($report->details as $detail)
                        <li>{{ $detail->limbah->name }}: {{ $detail->qty }} {{ $detail->unit }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </tbody>
</table>
