@extends('layouts.main')
@section('title', 'Dashboard')
@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Waste Report</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <!-- Tanggal Saat Ini -->
                            <div class="me-3">
                                <span class="fw-semibold">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</span>
                            </div>
                            <!-- Form Pilihan Bulan -->
                            <div>
                                <form method="GET" action="{{ route('dashboard') }}">
                                    <select class="form-select" name="month" onchange="this.form.submit()">
                                        <option value="1" {{ $month == '1' ? 'selected' : '' }}>January</option>
                                        <option value="2" {{ $month == '2' ? 'selected' : '' }}>February</option>
                                        <option value="3" {{ $month == '3' ? 'selected' : '' }}>March</option>
                                        <option value="4" {{ $month == '4' ? 'selected' : '' }}>April</option>
                                        <option value="5" {{ $month == '5' ? 'selected' : '' }}>May</option>
                                        <option value="6" {{ $month == '6' ? 'selected' : '' }}>June</option>
                                        <option value="7" {{ $month == '7' ? 'selected' : '' }}>July</option>
                                        <option value="8" {{ $month == '8' ? 'selected' : '' }}>August</option>
                                        <option value="9" {{ $month == '9' ? 'selected' : '' }}>September</option>
                                        <option value="10" {{ $month == '10' ? 'selected' : '' }}>October</option>
                                        <option value="11" {{ $month == '11' ? 'selected' : '' }}>November</option>
                                        <option value="12" {{ $month == '12' ? 'selected' : '' }}>December</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="waste-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('waste-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Waste Management'
                },
                xAxis: {
                    categories: @json($limbahCodes), // Kode limbah sebagai kategori (sumbu X)
                    title: {
                        text: 'Waste Code'
                    }
                },
                yAxis: [{ // Y Axis pertama (Kiri)
                    title: {
                        text: 'Quantity (Kg)'
                    },
                    labels: {
                        format: '{value} Kg'
                    },
                    opposite: false // Sumbu di sisi kiri
                }, { // Y Axis kedua (Kanan)
                    title: {
                        text: 'Quantity (Pcs)'
                    },
                    labels: {
                        format: '{value} Pcs'
                    },
                    opposite: true // Sumbu di sisi kanan
                }],
                series: [{
                    name: 'Waste (Kg)',
                    data: @json($quantitiesKg), // Data dalam unit Kg
                    yAxis: 0 // Gunakan Y Axis pertama (Kiri)
                }, {
                    name: 'Waste (Pcs)',
                    data: @json($quantitiesPcs), // Data dalam unit Pcs
                    yAxis: 1 // Gunakan Y Axis kedua (Kanan)
                }]
            });
        });
    </script>
@endpush
