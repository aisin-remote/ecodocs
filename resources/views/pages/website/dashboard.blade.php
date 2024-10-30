@extends('layouts.main')
@section('title', 'Dashboard')
@section('main')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Sales Overview</h5>
                        </div>
                        <div>
                            <select class="form-select">
                                <option value="1">March 2023</option>
                                <option value="2">April 2023</option>
                                <option value="3">May 2023</option>
                                <option value="4">June 2023</option>
                            </select>
                        </div>
                    </div>
                    <div id="chart" style="min-height: 360px;">
                        <div id="apexchartsoa7yrbyz" class="apexcharts-canvas apexchartsoa7yrbyz apexcharts-theme-light"
                            style="width: 590px; height: 345px;"><svg id="SvgjsSvg1527" width="590" height="345"
                                xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                transform="translate(-15, 0)" style="background: transparent;">
                                <g id="SvgjsG1529" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(50.03750038146973, 30)">
                                    <defs id="SvgjsDefs1528">
                                        <linearGradient id="SvgjsLinearGradient1533" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop1534" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)"
                                                offset="0"></stop>
                                            <stop id="SvgjsStop1535" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)"
                                                offset="1"></stop>
                                            <stop id="SvgjsStop1536" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)"
                                                offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMaskoa7yrbyz">
                                            <rect id="SvgjsRect1538" width="536.9624996185303" height="278.406400308609"
                                                x="-3.5" y="-1.5" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskoa7yrbyz"></clipPath>
                                        <clipPath id="nonForecastMaskoa7yrbyz"></clipPath>
                                        <clipPath id="gridRectMarkerMaskoa7yrbyz">
                                            <rect id="SvgjsRect1539" width="533.9624996185303" height="279.406400308609"
                                                x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect1537" width="11.59292967915535" height="275.406400308609" x="0" y="0"
                                        rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3"
                                        fill="url(#SvgjsLinearGradient1533)" class="apexcharts-xcrosshairs"
                                        y2="275.406400308609" filter="none" fill-opacity="0.9"></rect>
                                    <line id="SvgjsLine1583" x1="0" y1="276.406400308609" x2="0"
                                        y2="282.406400308609" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1584" x1="66.24531245231628" y1="276.406400308609"
                                        x2="66.24531245231628" y2="282.406400308609" stroke="#e0e0e0" stroke-dasharray="0"
                                        stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1585" x1="132.49062490463257" y1="276.406400308609"
                                        x2="132.49062490463257" y2="282.406400308609" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1586" x1="198.73593735694885" y1="276.406400308609"
                                        x2="198.73593735694885" y2="282.406400308609" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1587" x1="264.98124980926514" y1="276.406400308609"
                                        x2="264.98124980926514" y2="282.406400308609" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1588" x1="331.2265622615814" y1="276.406400308609"
                                        x2="331.2265622615814" y2="282.406400308609" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1589" x1="397.4718747138977" y1="276.406400308609"
                                        x2="397.4718747138977" y2="282.406400308609" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1590" x1="463.717187166214" y1="276.406400308609"
                                        x2="463.717187166214" y2="282.406400308609" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1591" x1="529.9624996185303" y1="276.406400308609"
                                        x2="529.9624996185303" y2="282.406400308609" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <g id="SvgjsG1599" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1600" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                            <text id="SvgjsText1602" font-family="inherit" x="33.12265622615814"
                                                y="304.406400308609" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#adb0bb"
                                                class="apexcharts-text apexcharts-xaxis-label grey--text lighten-2--text fill-color"
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan1603">16/08</tspan>
                                                <title>16/08</title>
                                            </text><text id="SvgjsText1605" font-family="inherit" x="99.36796867847443"
                                                y="304.406400308609" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#adb0bb"
                                                class="apexcharts-text apexcharts-xaxis-label grey--text lighten-2--text fill-color"
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan1606">17/08</tspan>
                                                <title>17/08</title>
                                            </text><text id="SvgjsText1608" font-family="inherit" x="165.6132811307907"
                                                y="304.406400308609" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#adb0bb"
                                                class="apexcharts-text apexcharts-xaxis-label grey--text lighten-2--text fill-color"
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan1609">18/08</tspan>
                                                <title>18/08</title>
                                            </text><text id="SvgjsText1611" font-family="inherit" x="231.858593583107"
                                                y="304.406400308609" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#adb0bb"
                                                class="apexcharts-text apexcharts-xaxis-label grey--text lighten-2--text fill-color"
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan1612">19/08</tspan>
                                                <title>19/08</title>
                                            </text><text id="SvgjsText1614" font-family="inherit" x="298.1039060354233"
                                                y="304.406400308609" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#adb0bb"
                                                class="apexcharts-text apexcharts-xaxis-label grey--text lighten-2--text fill-color"
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan1615">20/08</tspan>
                                                <title>20/08</title>
                                            </text><text id="SvgjsText1617" font-family="inherit" x="364.34921848773956"
                                                y="304.406400308609" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#adb0bb"
                                                class="apexcharts-text apexcharts-xaxis-label grey--text lighten-2--text fill-color"
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan1618">21/08</tspan>
                                                <title>21/08</title>
                                            </text><text id="SvgjsText1620" font-family="inherit" x="430.59453094005585"
                                                y="304.406400308609" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#adb0bb"
                                                class="apexcharts-text apexcharts-xaxis-label grey--text lighten-2--text fill-color"
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan1621">22/08</tspan>
                                                <title>22/08</title>
                                            </text><text id="SvgjsText1623" font-family="inherit" x="496.83984339237213"
                                                y="304.406400308609" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#adb0bb"
                                                class="apexcharts-text apexcharts-xaxis-label grey--text lighten-2--text fill-color"
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan1624">23/08</tspan>
                                                <title>23/08</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG1579" class="apexcharts-grid">
                                        <g id="SvgjsG1580" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1593" x1="0" y1="68.85160007715226"
                                                x2="529.9624996185303" y2="68.85160007715226" stroke="rgba(0,0,0,0.1)"
                                                stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1594" x1="0" y1="137.7032001543045"
                                                x2="529.9624996185303" y2="137.7032001543045" stroke="rgba(0,0,0,0.1)"
                                                stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1595" x1="0" y1="206.55480023145677"
                                                x2="529.9624996185303" y2="206.55480023145677" stroke="rgba(0,0,0,0.1)"
                                                stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <g id="SvgjsG1581" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1598" x1="0" y1="275.406400308609"
                                            x2="529.9624996185303" y2="275.406400308609" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1597" x1="0" y1="1" x2="0"
                                            y2="275.406400308609" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1540" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG1541" class="apexcharts-series" rel="1"
                                            seriesName="Earningsxthisxmonthx" data:realIndex="0">
                                            <path id="SvgjsPath1545"
                                                d="M 21.52972654700279 275.407400308609 L 21.52972654700279 36.984220034718504 C 21.52972654700279 33.984220034718504 24.52972654700279 30.9842200347185 27.52972654700279 30.9842200347185 L 27.52972654700279 30.9842200347185 C 28.82619138658047 30.9842200347185 30.122656226158142 33.984220034718504 30.122656226158142 36.984220034718504 L 30.122656226158142 275.407400308609 z "
                                                fill="rgba(93,135,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 21.52972654700279 275.407400308609 L 21.52972654700279 36.984220034718504 C 21.52972654700279 33.984220034718504 24.52972654700279 30.9842200347185 27.52972654700279 30.9842200347185 L 27.52972654700279 30.9842200347185 C 28.82619138658047 30.9842200347185 30.122656226158142 33.984220034718504 30.122656226158142 36.984220034718504 L 30.122656226158142 275.407400308609 z "
                                                pathFrom="M 21.52972654700279 275.407400308609 L 21.52972654700279 275.407400308609 L 30.122656226158142 275.407400308609 L 30.122656226158142 275.407400308609 L 30.122656226158142 275.407400308609 L 30.122656226158142 275.407400308609 L 30.122656226158142 275.407400308609 L 21.52972654700279 275.407400308609 z"
                                                cy="30.9832200347185" cx="86.27503899931908" j="0" val="355"
                                                barHeight="244.42318027389052" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1547"
                                                d="M 87.77503899931908 275.407400308609 L 87.77503899931908 12.88616000771523 C 87.77503899931908 9.88616000771523 90.77503899931908 6.886160007715229 93.77503899931908 6.886160007715229 L 93.77503899931908 6.886160007715229 C 95.07150383889675 6.886160007715229 96.36796867847443 9.88616000771523 96.36796867847443 12.88616000771523 L 96.36796867847443 275.407400308609 z "
                                                fill="rgba(93,135,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 87.77503899931908 275.407400308609 L 87.77503899931908 12.88616000771523 C 87.77503899931908 9.88616000771523 90.77503899931908 6.886160007715229 93.77503899931908 6.886160007715229 L 93.77503899931908 6.886160007715229 C 95.07150383889675 6.886160007715229 96.36796867847443 9.88616000771523 96.36796867847443 12.88616000771523 L 96.36796867847443 275.407400308609 z "
                                                pathFrom="M 87.77503899931908 275.407400308609 L 87.77503899931908 275.407400308609 L 96.36796867847443 275.407400308609 L 96.36796867847443 275.407400308609 L 96.36796867847443 275.407400308609 L 96.36796867847443 275.407400308609 L 96.36796867847443 275.407400308609 L 87.77503899931908 275.407400308609 z"
                                                cy="6.885160007715228" cx="152.52035145163535" j="1" val="390"
                                                barHeight="268.5212403008938" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1549"
                                                d="M 154.02035145163535 275.407400308609 L 154.02035145163535 74.85260007715226 C 154.02035145163535 71.85260007715226 157.02035145163535 68.85260007715226 160.02035145163535 68.85260007715226 L 160.02035145163535 68.85260007715226 C 161.31681629121303 68.85260007715226 162.6132811307907 71.85260007715226 162.6132811307907 74.85260007715226 L 162.6132811307907 275.407400308609 z "
                                                fill="rgba(93,135,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 154.02035145163535 275.407400308609 L 154.02035145163535 74.85260007715226 C 154.02035145163535 71.85260007715226 157.02035145163535 68.85260007715226 160.02035145163535 68.85260007715226 L 160.02035145163535 68.85260007715226 C 161.31681629121303 68.85260007715226 162.6132811307907 71.85260007715226 162.6132811307907 74.85260007715226 L 162.6132811307907 275.407400308609 z "
                                                pathFrom="M 154.02035145163535 275.407400308609 L 154.02035145163535 275.407400308609 L 162.6132811307907 275.407400308609 L 162.6132811307907 275.407400308609 L 162.6132811307907 275.407400308609 L 162.6132811307907 275.407400308609 L 162.6132811307907 275.407400308609 L 154.02035145163535 275.407400308609 z"
                                                cy="68.85160007715226" cx="218.76566390395163" j="2" val="300"
                                                barHeight="206.55480023145677" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1551"
                                                d="M 220.26566390395163 275.407400308609 L 220.26566390395163 40.42680003857611 C 220.26566390395163 37.42680003857611 223.26566390395163 34.42680003857611 226.26566390395163 34.42680003857611 L 226.26566390395163 34.42680003857611 C 227.5621287435293 34.42680003857611 228.858593583107 37.42680003857611 228.858593583107 40.42680003857611 L 228.858593583107 275.407400308609 z "
                                                fill="rgba(93,135,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 220.26566390395163 275.407400308609 L 220.26566390395163 40.42680003857611 C 220.26566390395163 37.42680003857611 223.26566390395163 34.42680003857611 226.26566390395163 34.42680003857611 L 226.26566390395163 34.42680003857611 C 227.5621287435293 34.42680003857611 228.858593583107 37.42680003857611 228.858593583107 40.42680003857611 L 228.858593583107 275.407400308609 z "
                                                pathFrom="M 220.26566390395163 275.407400308609 L 220.26566390395163 275.407400308609 L 228.858593583107 275.407400308609 L 228.858593583107 275.407400308609 L 228.858593583107 275.407400308609 L 228.858593583107 275.407400308609 L 228.858593583107 275.407400308609 L 220.26566390395163 275.407400308609 z"
                                                cy="34.425800038576114" cx="285.0109763562679" j="3" val="350"
                                                barHeight="240.9806002700329" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1553"
                                                d="M 286.5109763562679 275.407400308609 L 286.5109763562679 12.88616000771523 C 286.5109763562679 9.88616000771523 289.5109763562679 6.886160007715229 292.5109763562679 6.886160007715229 L 292.5109763562679 6.886160007715229 C 293.8074411958456 6.886160007715229 295.1039060354233 9.88616000771523 295.1039060354233 12.88616000771523 L 295.1039060354233 275.407400308609 z "
                                                fill="rgba(93,135,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 286.5109763562679 275.407400308609 L 286.5109763562679 12.88616000771523 C 286.5109763562679 9.88616000771523 289.5109763562679 6.886160007715229 292.5109763562679 6.886160007715229 L 292.5109763562679 6.886160007715229 C 293.8074411958456 6.886160007715229 295.1039060354233 9.88616000771523 295.1039060354233 12.88616000771523 L 295.1039060354233 275.407400308609 z "
                                                pathFrom="M 286.5109763562679 275.407400308609 L 286.5109763562679 275.407400308609 L 295.1039060354233 275.407400308609 L 295.1039060354233 275.407400308609 L 295.1039060354233 275.407400308609 L 295.1039060354233 275.407400308609 L 295.1039060354233 275.407400308609 L 286.5109763562679 275.407400308609 z"
                                                cy="6.885160007715228" cx="351.2562888085842" j="4" val="390"
                                                barHeight="268.5212403008938" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1555"
                                                d="M 352.7562888085842 275.407400308609 L 352.7562888085842 157.47452016973497 C 352.7562888085842 154.47452016973497 355.7562888085842 151.47452016973497 358.7562888085842 151.47452016973497 L 358.7562888085842 151.47452016973497 C 360.0527536481619 151.47452016973497 361.34921848773956 154.47452016973497 361.34921848773956 157.47452016973497 L 361.34921848773956 275.407400308609 z "
                                                fill="rgba(93,135,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 352.7562888085842 275.407400308609 L 352.7562888085842 157.47452016973497 C 352.7562888085842 154.47452016973497 355.7562888085842 151.47452016973497 358.7562888085842 151.47452016973497 L 358.7562888085842 151.47452016973497 C 360.0527536481619 151.47452016973497 361.34921848773956 154.47452016973497 361.34921848773956 157.47452016973497 L 361.34921848773956 275.407400308609 z "
                                                pathFrom="M 352.7562888085842 275.407400308609 L 352.7562888085842 275.407400308609 L 361.34921848773956 275.407400308609 L 361.34921848773956 275.407400308609 L 361.34921848773956 275.407400308609 L 361.34921848773956 275.407400308609 L 361.34921848773956 275.407400308609 L 352.7562888085842 275.407400308609 z"
                                                cy="151.47352016973497" cx="417.5016012609005" j="5" val="180"
                                                barHeight="123.93288013887405" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1557"
                                                d="M 419.0016012609005 275.407400308609 L 419.0016012609005 36.984220034718504 C 419.0016012609005 33.984220034718504 422.0016012609005 30.9842200347185 425.0016012609005 30.9842200347185 L 425.0016012609005 30.9842200347185 C 426.2980661004782 30.9842200347185 427.59453094005585 33.984220034718504 427.59453094005585 36.984220034718504 L 427.59453094005585 275.407400308609 z "
                                                fill="rgba(93,135,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 419.0016012609005 275.407400308609 L 419.0016012609005 36.984220034718504 C 419.0016012609005 33.984220034718504 422.0016012609005 30.9842200347185 425.0016012609005 30.9842200347185 L 425.0016012609005 30.9842200347185 C 426.2980661004782 30.9842200347185 427.59453094005585 33.984220034718504 427.59453094005585 36.984220034718504 L 427.59453094005585 275.407400308609 z "
                                                pathFrom="M 419.0016012609005 275.407400308609 L 419.0016012609005 275.407400308609 L 427.59453094005585 275.407400308609 L 427.59453094005585 275.407400308609 L 427.59453094005585 275.407400308609 L 427.59453094005585 275.407400308609 L 427.59453094005585 275.407400308609 L 419.0016012609005 275.407400308609 z"
                                                cy="30.9832200347185" cx="483.74691371321677" j="6" val="355"
                                                barHeight="244.42318027389052" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1559"
                                                d="M 485.24691371321677 275.407400308609 L 485.24691371321677 12.88616000771523 C 485.24691371321677 9.88616000771523 488.24691371321677 6.886160007715229 491.24691371321677 6.886160007715229 L 491.24691371321677 6.886160007715229 C 492.5433785527945 6.886160007715229 493.83984339237213 9.88616000771523 493.83984339237213 12.88616000771523 L 493.83984339237213 275.407400308609 z "
                                                fill="rgba(93,135,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 485.24691371321677 275.407400308609 L 485.24691371321677 12.88616000771523 C 485.24691371321677 9.88616000771523 488.24691371321677 6.886160007715229 491.24691371321677 6.886160007715229 L 491.24691371321677 6.886160007715229 C 492.5433785527945 6.886160007715229 493.83984339237213 9.88616000771523 493.83984339237213 12.88616000771523 L 493.83984339237213 275.407400308609 z "
                                                pathFrom="M 485.24691371321677 275.407400308609 L 485.24691371321677 275.407400308609 L 493.83984339237213 275.407400308609 L 493.83984339237213 275.407400308609 L 493.83984339237213 275.407400308609 L 493.83984339237213 275.407400308609 L 493.83984339237213 275.407400308609 L 485.24691371321677 275.407400308609 z"
                                                cy="6.885160007715228" cx="549.9922261655331" j="7" val="390"
                                                barHeight="268.5212403008938" barWidth="11.59292967915535"></path>
                                            <g id="SvgjsG1543" class="apexcharts-bar-goals-markers"
                                                style="pointer-events: none">
                                                <g id="SvgjsG1544" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1546" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1548" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1550" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1552" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1554" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1556" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1558" className="apexcharts-bar-goals-groups"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1560" class="apexcharts-series" rel="2"
                                            seriesName="Expensexthisxmonthx" data:realIndex="1">
                                            <path id="SvgjsPath1564"
                                                d="M 33.12265622615814 275.407400308609 L 33.12265622615814 88.62292009258272 C 33.12265622615814 85.62292009258272 36.12265622615814 82.62292009258272 39.12265622615814 82.62292009258272 L 39.12265622615814 82.62292009258272 C 40.419121065735816 82.62292009258272 41.71558590531349 85.62292009258272 41.71558590531349 88.62292009258272 L 41.71558590531349 275.407400308609 z "
                                                fill="rgba(73,190,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 33.12265622615814 275.407400308609 L 33.12265622615814 88.62292009258272 C 33.12265622615814 85.62292009258272 36.12265622615814 82.62292009258272 39.12265622615814 82.62292009258272 L 39.12265622615814 82.62292009258272 C 40.419121065735816 82.62292009258272 41.71558590531349 85.62292009258272 41.71558590531349 88.62292009258272 L 41.71558590531349 275.407400308609 z "
                                                pathFrom="M 33.12265622615814 275.407400308609 L 33.12265622615814 275.407400308609 L 41.71558590531349 275.407400308609 L 41.71558590531349 275.407400308609 L 41.71558590531349 275.407400308609 L 41.71558590531349 275.407400308609 L 41.71558590531349 275.407400308609 L 33.12265622615814 275.407400308609 z"
                                                cy="82.62192009258271" cx="97.86796867847443" j="0" val="280"
                                                barHeight="192.7844802160263" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1566"
                                                d="M 99.36796867847443 275.407400308609 L 99.36796867847443 109.27840011572837 C 99.36796867847443 106.27840011572837 102.36796867847443 103.27840011572837 105.36796867847443 103.27840011572837 L 105.36796867847443 103.27840011572837 C 106.6644335180521 103.27840011572837 107.96089835762977 106.27840011572837 107.96089835762977 109.27840011572837 L 107.96089835762977 275.407400308609 z "
                                                fill="rgba(73,190,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 99.36796867847443 275.407400308609 L 99.36796867847443 109.27840011572837 C 99.36796867847443 106.27840011572837 102.36796867847443 103.27840011572837 105.36796867847443 103.27840011572837 L 105.36796867847443 103.27840011572837 C 106.6644335180521 103.27840011572837 107.96089835762977 106.27840011572837 107.96089835762977 109.27840011572837 L 107.96089835762977 275.407400308609 z "
                                                pathFrom="M 99.36796867847443 275.407400308609 L 99.36796867847443 275.407400308609 L 107.96089835762977 275.407400308609 L 107.96089835762977 275.407400308609 L 107.96089835762977 275.407400308609 L 107.96089835762977 275.407400308609 L 107.96089835762977 275.407400308609 L 99.36796867847443 275.407400308609 z"
                                                cy="103.27740011572837" cx="164.1132811307907" j="1" val="250"
                                                barHeight="172.12900019288065" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1568"
                                                d="M 165.6132811307907 275.407400308609 L 165.6132811307907 57.63970005786418 C 165.6132811307907 54.63970005786418 168.6132811307907 51.63970005786418 171.6132811307907 51.63970005786418 L 171.6132811307907 51.63970005786418 C 172.9097459703684 51.63970005786418 174.20621080994607 54.63970005786418 174.20621080994607 57.63970005786418 L 174.20621080994607 275.407400308609 z "
                                                fill="rgba(73,190,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 165.6132811307907 275.407400308609 L 165.6132811307907 57.63970005786418 C 165.6132811307907 54.63970005786418 168.6132811307907 51.63970005786418 171.6132811307907 51.63970005786418 L 171.6132811307907 51.63970005786418 C 172.9097459703684 51.63970005786418 174.20621080994607 54.63970005786418 174.20621080994607 57.63970005786418 L 174.20621080994607 275.407400308609 z "
                                                pathFrom="M 165.6132811307907 275.407400308609 L 165.6132811307907 275.407400308609 L 174.20621080994607 275.407400308609 L 174.20621080994607 275.407400308609 L 174.20621080994607 275.407400308609 L 174.20621080994607 275.407400308609 L 174.20621080994607 275.407400308609 L 165.6132811307907 275.407400308609 z"
                                                cy="51.638700057864185" cx="230.358593583107" j="2" val="325"
                                                barHeight="223.76770025074484" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1570"
                                                d="M 231.858593583107 275.407400308609 L 231.858593583107 133.37646014273167 C 231.858593583107 130.37646014273167 234.858593583107 127.37646014273167 237.858593583107 127.37646014273167 L 237.858593583107 127.37646014273167 C 239.15505842268468 127.37646014273167 240.45152326226236 130.37646014273167 240.45152326226236 133.37646014273167 L 240.45152326226236 275.407400308609 z "
                                                fill="rgba(73,190,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 231.858593583107 275.407400308609 L 231.858593583107 133.37646014273167 C 231.858593583107 130.37646014273167 234.858593583107 127.37646014273167 237.858593583107 127.37646014273167 L 237.858593583107 127.37646014273167 C 239.15505842268468 127.37646014273167 240.45152326226236 130.37646014273167 240.45152326226236 133.37646014273167 L 240.45152326226236 275.407400308609 z "
                                                pathFrom="M 231.858593583107 275.407400308609 L 231.858593583107 275.407400308609 L 240.45152326226236 275.407400308609 L 240.45152326226236 275.407400308609 L 240.45152326226236 275.407400308609 L 240.45152326226236 275.407400308609 L 240.45152326226236 275.407400308609 L 231.858593583107 275.407400308609 z"
                                                cy="127.37546014273167" cx="296.6039060354233" j="3" val="215"
                                                barHeight="148.03094016587735" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1572"
                                                d="M 298.1039060354233 275.407400308609 L 298.1039060354233 109.27840011572837 C 298.1039060354233 106.27840011572837 301.1039060354233 103.27840011572837 304.1039060354233 103.27840011572837 L 304.1039060354233 103.27840011572837 C 305.40037087500093 103.27840011572837 306.69683571457864 106.27840011572837 306.69683571457864 109.27840011572837 L 306.69683571457864 275.407400308609 z "
                                                fill="rgba(73,190,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 298.1039060354233 275.407400308609 L 298.1039060354233 109.27840011572837 C 298.1039060354233 106.27840011572837 301.1039060354233 103.27840011572837 304.1039060354233 103.27840011572837 L 304.1039060354233 103.27840011572837 C 305.40037087500093 103.27840011572837 306.69683571457864 106.27840011572837 306.69683571457864 109.27840011572837 L 306.69683571457864 275.407400308609 z "
                                                pathFrom="M 298.1039060354233 275.407400308609 L 298.1039060354233 275.407400308609 L 306.69683571457864 275.407400308609 L 306.69683571457864 275.407400308609 L 306.69683571457864 275.407400308609 L 306.69683571457864 275.407400308609 L 306.69683571457864 275.407400308609 L 298.1039060354233 275.407400308609 z"
                                                cy="103.27740011572837" cx="362.84921848773956" j="4" val="250"
                                                barHeight="172.12900019288065" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1574"
                                                d="M 364.34921848773956 275.407400308609 L 364.34921848773956 67.96744006943703 C 364.34921848773956 64.96744006943703 367.34921848773956 61.967440069437025 370.34921848773956 61.967440069437025 L 370.34921848773956 61.967440069437025 C 371.6456833273172 61.967440069437025 372.9421481668949 64.96744006943703 372.9421481668949 67.96744006943703 L 372.9421481668949 275.407400308609 z "
                                                fill="rgba(73,190,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 364.34921848773956 275.407400308609 L 364.34921848773956 67.96744006943703 C 364.34921848773956 64.96744006943703 367.34921848773956 61.967440069437025 370.34921848773956 61.967440069437025 L 370.34921848773956 61.967440069437025 C 371.6456833273172 61.967440069437025 372.9421481668949 64.96744006943703 372.9421481668949 67.96744006943703 L 372.9421481668949 275.407400308609 z "
                                                pathFrom="M 364.34921848773956 275.407400308609 L 364.34921848773956 275.407400308609 L 372.9421481668949 275.407400308609 L 372.9421481668949 275.407400308609 L 372.9421481668949 275.407400308609 L 372.9421481668949 275.407400308609 L 372.9421481668949 275.407400308609 L 364.34921848773956 275.407400308609 z"
                                                cy="61.96644006943703" cx="429.09453094005585" j="5" val="310"
                                                barHeight="213.439960239172" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1576"
                                                d="M 430.59453094005585 275.407400308609 L 430.59453094005585 88.62292009258272 C 430.59453094005585 85.62292009258272 433.59453094005585 82.62292009258272 436.59453094005585 82.62292009258272 L 436.59453094005585 82.62292009258272 C 437.8909957796335 82.62292009258272 439.1874606192112 85.62292009258272 439.1874606192112 88.62292009258272 L 439.1874606192112 275.407400308609 z "
                                                fill="rgba(73,190,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 430.59453094005585 275.407400308609 L 430.59453094005585 88.62292009258272 C 430.59453094005585 85.62292009258272 433.59453094005585 82.62292009258272 436.59453094005585 82.62292009258272 L 436.59453094005585 82.62292009258272 C 437.8909957796335 82.62292009258272 439.1874606192112 85.62292009258272 439.1874606192112 88.62292009258272 L 439.1874606192112 275.407400308609 z "
                                                pathFrom="M 430.59453094005585 275.407400308609 L 430.59453094005585 275.407400308609 L 439.1874606192112 275.407400308609 L 439.1874606192112 275.407400308609 L 439.1874606192112 275.407400308609 L 439.1874606192112 275.407400308609 L 439.1874606192112 275.407400308609 L 430.59453094005585 275.407400308609 z"
                                                cy="82.62192009258271" cx="495.33984339237213" j="6" val="280"
                                                barHeight="192.7844802160263" barWidth="11.59292967915535"></path>
                                            <path id="SvgjsPath1578"
                                                d="M 496.83984339237213 275.407400308609 L 496.83984339237213 109.27840011572837 C 496.83984339237213 106.27840011572837 499.83984339237213 103.27840011572837 502.83984339237213 103.27840011572837 L 502.83984339237213 103.27840011572837 C 504.1363082319498 103.27840011572837 505.4327730715275 106.27840011572837 505.4327730715275 109.27840011572837 L 505.4327730715275 275.407400308609 z "
                                                fill="rgba(73,190,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskoa7yrbyz)"
                                                pathTo="M 496.83984339237213 275.407400308609 L 496.83984339237213 109.27840011572837 C 496.83984339237213 106.27840011572837 499.83984339237213 103.27840011572837 502.83984339237213 103.27840011572837 L 502.83984339237213 103.27840011572837 C 504.1363082319498 103.27840011572837 505.4327730715275 106.27840011572837 505.4327730715275 109.27840011572837 L 505.4327730715275 275.407400308609 z "
                                                pathFrom="M 496.83984339237213 275.407400308609 L 496.83984339237213 275.407400308609 L 505.4327730715275 275.407400308609 L 505.4327730715275 275.407400308609 L 505.4327730715275 275.407400308609 L 505.4327730715275 275.407400308609 L 505.4327730715275 275.407400308609 L 496.83984339237213 275.407400308609 z"
                                                cy="103.27740011572837" cx="561.5851558446884" j="7" val="250"
                                                barHeight="172.12900019288065" barWidth="11.59292967915535"></path>
                                            <g id="SvgjsG1562" class="apexcharts-bar-goals-markers"
                                                style="pointer-events: none">
                                                <g id="SvgjsG1563" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1565" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1567" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1569" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1571" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1573" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1575" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG1577" className="apexcharts-bar-goals-groups"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1542" class="apexcharts-datalabels" data:realIndex="0"></g>
                                        <g id="SvgjsG1561" class="apexcharts-datalabels" data:realIndex="1"></g>
                                    </g>
                                    <g id="SvgjsG1582" class="apexcharts-grid-borders">
                                        <line id="SvgjsLine1592" x1="0" y1="0" x2="529.9624996185303"
                                            y2="0" stroke="rgba(0,0,0,0.1)" stroke-dasharray="3"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1596" x1="0" y1="275.406400308609"
                                            x2="529.9624996185303" y2="275.406400308609" stroke="rgba(0,0,0,0.1)"
                                            stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline">
                                        </line>
                                        <line id="SvgjsLine1625" x1="0" y1="276.406400308609"
                                            x2="529.9624996185303" y2="276.406400308609" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                    </g>
                                    <line id="SvgjsLine1643" x1="0" y1="0" x2="529.9624996185303"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1644" x1="0" y1="0" x2="529.9624996185303"
                                        y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1645" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1646" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1647" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG1626" class="apexcharts-yaxis" rel="0"
                                    transform="translate(20.037500381469727, 0)">
                                    <g id="SvgjsG1627" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1629"
                                            font-family="inherit" x="20" y="31.4" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px" font-weight="400" fill="#adb0bb"
                                            class="apexcharts-text apexcharts-yaxis-label grey--text lighten-2--text fill-color"
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan1630">400</tspan>
                                            <title>400</title>
                                        </text><text id="SvgjsText1632" font-family="inherit" x="20"
                                            y="100.25160007715226" text-anchor="end" dominant-baseline="auto"
                                            font-size="11px" font-weight="400" fill="#adb0bb"
                                            class="apexcharts-text apexcharts-yaxis-label grey--text lighten-2--text fill-color"
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan1633">300</tspan>
                                            <title>300</title>
                                        </text><text id="SvgjsText1635" font-family="inherit" x="20"
                                            y="169.10320015430452" text-anchor="end" dominant-baseline="auto"
                                            font-size="11px" font-weight="400" fill="#adb0bb"
                                            class="apexcharts-text apexcharts-yaxis-label grey--text lighten-2--text fill-color"
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan1636">200</tspan>
                                            <title>200</title>
                                        </text><text id="SvgjsText1638" font-family="inherit" x="20"
                                            y="237.95480023145677" text-anchor="end" dominant-baseline="auto"
                                            font-size="11px" font-weight="400" fill="#adb0bb"
                                            class="apexcharts-text apexcharts-yaxis-label grey--text lighten-2--text fill-color"
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan1639">100</tspan>
                                            <title>100</title>
                                        </text><text id="SvgjsText1641" font-family="inherit" x="20" y="306.806400308609"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-weight="400" fill="#adb0bb"
                                            class="apexcharts-text apexcharts-yaxis-label grey--text lighten-2--text fill-color"
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan1642">0</tspan>
                                            <title>0</title>
                                        </text></g>
                                </g>
                                <g id="SvgjsG1530" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 172.5px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(93, 135, 255);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(73, 190, 255);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                            <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                <div class="apexcharts-menu-icon" title="Menu"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                    </svg></div>
                                <div class="apexcharts-menu">
                                    <div class="apexcharts-menu-item exportSVG" title="Download SVG">Download SVG</div>
                                    <div class="apexcharts-menu-item exportPNG" title="Download PNG">Download PNG</div>
                                    <div class="apexcharts-menu-item exportCSV" title="Download CSV">Download CSV</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">$36,358</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <span
                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last year</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-4">
                                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                            <span class="fs-2">2023</span>
                                        </div>
                                        <div>
                                            <span
                                                class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                            <span class="fs-2">2023</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="breakup" style="min-height: 128.7px;">
                                            <div id="apexcharts84pv46eqi"
                                                class="apexcharts-canvas apexcharts84pv46eqi apexcharts-theme-light"
                                                style="width: 180px; height: 128.7px;"><svg id="SvgjsSvg1648"
                                                    width="180" height="128.7" xmlns="http://www.w3.org/2000/svg"
                                                    version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                    style="background: transparent;">
                                                    <g id="SvgjsG1650" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(28, 0)">
                                                        <defs id="SvgjsDefs1649">
                                                            <clipPath id="gridRectMask84pv46eqi">
                                                                <rect id="SvgjsRect1652" width="132" height="150"
                                                                    x="-3" y="-1" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMask84pv46eqi"></clipPath>
                                                            <clipPath id="nonForecastMask84pv46eqi"></clipPath>
                                                            <clipPath id="gridRectMarkerMask84pv46eqi">
                                                                <rect id="SvgjsRect1653" width="130" height="152"
                                                                    x="-2" y="-2" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g id="SvgjsG1654" class="apexcharts-pie">
                                                            <g id="SvgjsG1655" transform="translate(0, 0) scale(1)">
                                                                <circle id="SvgjsCircle1656" r="41.59756097560976"
                                                                    cx="63" cy="63" fill="transparent">
                                                                </circle>
                                                                <g id="SvgjsG1657" class="apexcharts-slices">
                                                                    <g id="SvgjsG1658"
                                                                        class="apexcharts-series apexcharts-pie-series"
                                                                        seriesName="2022" rel="1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath1659"
                                                                            d="M 63 7.536585365853654 A 55.463414634146346 55.463414634146346 0 0 1 103.6849453198706 100.69516662913668 L 93.51370898990294 91.27137497185251 A 41.59756097560976 41.59756097560976 0 0 0 63 21.40243902439024 L 63 7.536585365853654 z"
                                                                            fill="rgba(93,135,255,1)" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="butt"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-pie-area apexcharts-donut-slice-0"
                                                                            index="0" j="0"
                                                                            data:angle="132.81553398058253"
                                                                            data:startAngle="0" data:strokeWidth="0"
                                                                            data:value="38"
                                                                            data:pathOrig="M 63 7.536585365853654 A 55.463414634146346 55.463414634146346 0 0 1 103.6849453198706 100.69516662913668 L 93.51370898990294 91.27137497185251 A 41.59756097560976 41.59756097560976 0 0 0 63 21.40243902439024 L 63 7.536585365853654 z">
                                                                        </path>
                                                                    </g>
                                                                    <g id="SvgjsG1660"
                                                                        class="apexcharts-series apexcharts-pie-series"
                                                                        seriesName="2021" rel="2"
                                                                        data:realIndex="1">
                                                                        <path id="SvgjsPath1661"
                                                                            d="M 103.6849453198706 100.69516662913668 A 55.463414634146346 55.463414634146346 0 0 1 7.594622861729029 60.463359102040855 L 21.445967146296773 61.097519326530644 A 41.59756097560976 41.59756097560976 0 0 0 93.51370898990294 91.27137497185251 L 103.6849453198706 100.69516662913668 z"
                                                                            fill="rgba(236,242,255,1)" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="butt"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-pie-area apexcharts-donut-slice-1"
                                                                            index="0" j="1"
                                                                            data:angle="139.8058252427184"
                                                                            data:startAngle="132.81553398058253"
                                                                            data:strokeWidth="0" data:value="40"
                                                                            data:pathOrig="M 103.6849453198706 100.69516662913668 A 55.463414634146346 55.463414634146346 0 0 1 7.594622861729029 60.463359102040855 L 21.445967146296773 61.097519326530644 A 41.59756097560976 41.59756097560976 0 0 0 93.51370898990294 91.27137497185251 L 103.6849453198706 100.69516662913668 z">
                                                                        </path>
                                                                    </g>
                                                                    <g id="SvgjsG1662"
                                                                        class="apexcharts-series apexcharts-pie-series"
                                                                        seriesName="2020" rel="3"
                                                                        data:realIndex="2">
                                                                        <path id="SvgjsPath1663"
                                                                            d="M 7.594622861729029 60.463359102040855 A 55.463414634146346 55.463414634146346 0 0 1 62.99031980805149 7.536586210609762 L 62.99273985603862 21.402439657957324 A 41.59756097560976 41.59756097560976 0 0 0 21.445967146296773 61.097519326530644 L 7.594622861729029 60.463359102040855 z"
                                                                            fill="rgba(249,249,253,1)" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="butt"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-pie-area apexcharts-donut-slice-2"
                                                                            index="0" j="2"
                                                                            data:angle="87.37864077669906"
                                                                            data:startAngle="272.62135922330094"
                                                                            data:strokeWidth="0" data:value="25"
                                                                            data:pathOrig="M 7.594622861729029 60.463359102040855 A 55.463414634146346 55.463414634146346 0 0 1 62.99031980805149 7.536586210609762 L 62.99273985603862 21.402439657957324 A 41.59756097560976 41.59756097560976 0 0 0 21.445967146296773 61.097519326530644 L 7.594622861729029 60.463359102040855 z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <line id="SvgjsLine1664" x1="0" y1="0"
                                                            x2="126" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs"></line>
                                                        <line id="SvgjsLine1665" x1="0" y1="0"
                                                            x2="126" y2="0" stroke-dasharray="0"
                                                            stroke-width="0" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                    </g>
                                                    <g id="SvgjsG1651" class="apexcharts-annotations"></g>
                                                </svg>
                                                <div class="apexcharts-legend"></div>
                                                <div class="apexcharts-tooltip apexcharts-theme-dark">
                                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                            class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(93, 135, 255);"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                            class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(236, 242, 255);"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                                            class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(249, 249, 253);"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Monthly Earnings -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                                    <h4 class="fw-semibold mb-3">$6,820</h4>
                                    <div class="d-flex align-items-center pb-1">
                                        <span
                                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-down-right text-danger"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last year</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-currency-dollar fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning" style="min-height: 60px;">
                            <div id="apexchartssparkline3"
                                class="apexcharts-canvas apexchartssparkline3 apexcharts-theme-light"
                                style="width: 313px; height: 60px;"><svg id="SvgjsSvg1667" width="313"
                                    height="60" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG1669" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(0, 0)">
                                        <defs id="SvgjsDefs1668">
                                            <clipPath id="gridRectMaskdrjdtf9u">
                                                <rect id="SvgjsRect1674" width="319" height="62" x="-3" y="-1"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskdrjdtf9u"></clipPath>
                                            <clipPath id="nonForecastMaskdrjdtf9u"></clipPath>
                                            <clipPath id="gridRectMarkerMaskdrjdtf9u">
                                                <rect id="SvgjsRect1675" width="317" height="64" x="-2" y="-2"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <line id="SvgjsLine1673" x1="0" y1="0" x2="0"
                                            y2="60" stroke="#b6b6b6" stroke-dasharray="3"
                                            stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0"
                                            width="1" height="60" fill="#b1b9c4" filter="none"
                                            fill-opacity="0.9" stroke-width="1"></line>
                                        <g id="SvgjsG1696" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1697" class="apexcharts-xaxis-texts-g"
                                                transform="translate(0, -4)"></g>
                                        </g>
                                        <g id="SvgjsG1682" class="apexcharts-grid">
                                            <g id="SvgjsG1683" class="apexcharts-gridlines-horizontal"
                                                style="display: none;">
                                                <line id="SvgjsLine1687" x1="0" y1="8.571428571428571"
                                                    x2="313" y2="8.571428571428571" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1688" x1="0" y1="17.142857142857142"
                                                    x2="313" y2="17.142857142857142" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1689" x1="0" y1="25.714285714285715"
                                                    x2="313" y2="25.714285714285715" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1690" x1="0" y1="34.285714285714285"
                                                    x2="313" y2="34.285714285714285" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1691" x1="0" y1="42.857142857142854"
                                                    x2="313" y2="42.857142857142854" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1692" x1="0" y1="51.42857142857142"
                                                    x2="313" y2="51.42857142857142" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1693" x1="0" y1="59.99999999999999"
                                                    x2="313" y2="59.99999999999999" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG1684" class="apexcharts-gridlines-vertical"
                                                style="display: none;"></g>
                                            <line id="SvgjsLine1695" x1="0" y1="60" x2="313"
                                                y2="60" stroke="transparent" stroke-dasharray="0"
                                                stroke-linecap="butt"></line>
                                            <line id="SvgjsLine1694" x1="0" y1="1" x2="0"
                                                y2="60" stroke="transparent" stroke-dasharray="0"
                                                stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG1676" class="apexcharts-area-series apexcharts-plot-series">
                                            <g id="SvgjsG1677" class="apexcharts-series" seriesName="Earnings"
                                                data:longestSeries="true" rel="1" data:realIndex="0">
                                                <path id="SvgjsPath1680"
                                                    d="M 0 60 L 0 38.57142857142857C 18.258333333333333 38.57142857142857 33.90833333333334 3.4285714285714306 52.16666666666667 3.4285714285714306C 70.42500000000001 3.4285714285714306 86.07500000000002 42.85714285714286 104.33333333333334 42.85714285714286C 122.59166666666667 42.85714285714286 138.24166666666667 25.714285714285715 156.5 25.714285714285715C 174.75833333333333 25.714285714285715 190.40833333333336 49.714285714285715 208.66666666666669 49.714285714285715C 226.925 49.714285714285715 242.57500000000005 10.285714285714292 260.83333333333337 10.285714285714292C 279.0916666666667 10.285714285714292 294.7416666666667 42.85714285714286 313 42.85714285714286C 313 42.85714285714286 313 42.85714285714286 313 60M 313 42.85714285714286z"
                                                    fill="rgba(73,190,255,0.05)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-area" index="0"
                                                    clip-path="url(#gridRectMaskdrjdtf9u)"
                                                    pathTo="M 0 60 L 0 38.57142857142857C 18.258333333333333 38.57142857142857 33.90833333333334 3.4285714285714306 52.16666666666667 3.4285714285714306C 70.42500000000001 3.4285714285714306 86.07500000000002 42.85714285714286 104.33333333333334 42.85714285714286C 122.59166666666667 42.85714285714286 138.24166666666667 25.714285714285715 156.5 25.714285714285715C 174.75833333333333 25.714285714285715 190.40833333333336 49.714285714285715 208.66666666666669 49.714285714285715C 226.925 49.714285714285715 242.57500000000005 10.285714285714292 260.83333333333337 10.285714285714292C 279.0916666666667 10.285714285714292 294.7416666666667 42.85714285714286 313 42.85714285714286C 313 42.85714285714286 313 42.85714285714286 313 60M 313 42.85714285714286z"
                                                    pathFrom="M -1 60 L -1 60 L 52.16666666666667 60 L 104.33333333333334 60 L 156.5 60 L 208.66666666666669 60 L 260.83333333333337 60 L 313 60">
                                                </path>
                                                <path id="SvgjsPath1681"
                                                    d="M 0 38.57142857142857C 18.258333333333333 38.57142857142857 33.90833333333334 3.4285714285714306 52.16666666666667 3.4285714285714306C 70.42500000000001 3.4285714285714306 86.07500000000002 42.85714285714286 104.33333333333334 42.85714285714286C 122.59166666666667 42.85714285714286 138.24166666666667 25.714285714285715 156.5 25.714285714285715C 174.75833333333333 25.714285714285715 190.40833333333336 49.714285714285715 208.66666666666669 49.714285714285715C 226.925 49.714285714285715 242.57500000000005 10.285714285714292 260.83333333333337 10.285714285714292C 279.0916666666667 10.285714285714292 294.7416666666667 42.85714285714286 313 42.85714285714286"
                                                    fill="none" fill-opacity="1" stroke="#49beff"
                                                    stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-area" index="0"
                                                    clip-path="url(#gridRectMaskdrjdtf9u)"
                                                    pathTo="M 0 38.57142857142857C 18.258333333333333 38.57142857142857 33.90833333333334 3.4285714285714306 52.16666666666667 3.4285714285714306C 70.42500000000001 3.4285714285714306 86.07500000000002 42.85714285714286 104.33333333333334 42.85714285714286C 122.59166666666667 42.85714285714286 138.24166666666667 25.714285714285715 156.5 25.714285714285715C 174.75833333333333 25.714285714285715 190.40833333333336 49.714285714285715 208.66666666666669 49.714285714285715C 226.925 49.714285714285715 242.57500000000005 10.285714285714292 260.83333333333337 10.285714285714292C 279.0916666666667 10.285714285714292 294.7416666666667 42.85714285714286 313 42.85714285714286"
                                                    pathFrom="M -1 60 L -1 60 L 52.16666666666667 60 L 104.33333333333334 60 L 156.5 60 L 208.66666666666669 60 L 260.83333333333337 60 L 313 60"
                                                    fill-rule="evenodd"></path>
                                                <g id="SvgjsG1678" class="apexcharts-series-markers-wrap"
                                                    data:realIndex="0">
                                                    <g class="apexcharts-series-markers">
                                                        <circle id="SvgjsCircle1711" r="0" cx="0"
                                                            cy="0"
                                                            class="apexcharts-marker w15fxcz8n no-pointer-events"
                                                            stroke="#ffffff" fill="#49beff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9"
                                                            default-marker-size="0"></circle>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1679" class="apexcharts-datalabels" data:realIndex="0"></g>
                                        </g>
                                        <g id="SvgjsG1685" class="apexcharts-grid-borders" style="display: none;">
                                            <line id="SvgjsLine1686" x1="0" y1="0" x2="313"
                                                y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <line id="SvgjsLine1706" x1="0" y1="0" x2="313"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1707" x1="0" y1="0" x2="313"
                                            y2="0" stroke-dasharray="0" stroke-width="0"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG1708" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG1709" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG1710" class="apexcharts-point-annotations"></g>
                                    </g>
                                    <rect id="SvgjsRect1672" width="0" height="0" x="0" y="0"
                                        rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                    <g id="SvgjsG1705" class="apexcharts-yaxis" rel="0"
                                        transform="translate(-18, 0)"></g>
                                    <g id="SvgjsG1670" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend" style="max-height: 30px;"></div>
                                <div class="apexcharts-tooltip apexcharts-theme-dark">
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(73, 190, 255);"></span>
                                        <div class="apexcharts-tooltip-text" style="font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
