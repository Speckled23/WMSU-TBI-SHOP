@extends('admin.layout.vendorlayout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::guard('admin')->user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Sales</p>
                                <p class="fs-30 mb-2">{{$sectionsCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Current Inventory</p>
                                <p class="fs-30 mb-2">{{$categoriesCount}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Pending Orders</p>
                                <p class="fs-30 mb-2">{{$ordersCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Coupons Available</p>
                                <p class="fs-30 mb-2">{{$couponsCount}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- K -->
        <div style="padding: 30px; color: black; position: static; left: 100px; top: 0;">
            <div>
                <div>
                    <!-- <form id="dateFilterForm">
                        <label for="startDate" style="color: #000;">Start Date:</label>
                            <input type="date" id="startDate" name="startDate" style="background-color: #E0F8FF; /* Light Sky Blue */
                                                                                border: 1px solid #87CEEB; /* Sky Blue */
                                                                                color: #000; /* Black */
                                                                                padding: 4px;
                                                                                border-radius: 5px;
                                                                                margin-right: 10px;">

                        <label for="endDate" style="color: #000;">End Date:</label>
                            <input type="date" id="endDate" name="endDate" style="background-color: #E0F8FF; /* Light Sky Blue */
                                                                            border: 1px solid #87CEEB; /* Sky Blue */
                                                                            color: #000; /* Black */
                                                                            padding: 4px;
                                                                            border-radius: 5px;">

                        <button id="filterButton" style="border-radius: 5px; border: 2px solid #E0F8FF; background-color: skyblue; color: white; padding: 4px 15px; cursor: pointer;">Apply Filter</button>
                    </form> -->
                </div>
            </div>
        </div>
        <!-- K -->
        <div class = 'row'>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Sales</p>
                        </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="vendorsales"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Average Order Value</p>
                        </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="vendorave"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Top Selling Products</p>
                        </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="topselling"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Inventory Turn Over</p>
                        </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="inventory"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Inventory Turn Over</p>
                        </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="cancelation"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Sales Growth Over Time</p>
                        </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="salesgrowth"></canvas>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
