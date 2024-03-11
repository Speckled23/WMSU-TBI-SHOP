@extends('admin.layout.layout')
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
                                <p class="mb-4">Total Sections</p>
                                <p class="fs-30 mb-2">{{$sectionsCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Categories</p>
                                <p class="fs-30 mb-2">{{$categoriesCount}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Products</p>
                                <p class="fs-30 mb-2">{{$productsCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Total Brands</p>
                                <p class="fs-30 mb-2">{{$brandsCount}}</p>
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
                                <p class="mb-4">Total Orders</p>
                                <p class="fs-30 mb-2">{{$ordersCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Coupons</p>
                                <p class="fs-30 mb-2">{{$couponsCount}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Users</p>
                                <p class="fs-30 mb-2">{{$usersCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
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
                            <p class="card-title">Overall Revenue</p>
                        </div>
                            <div class="row d-flex">
                                <button class="btn btn-outline-dark col-2  ml-5"  onclick="renderSales()">Refresh</button>
                                <select class="form-control col-2 mx-2" name="" onchange="renderSales()" id="overallRevenue" @if($years) value="$years[0]->year" @endif>
                                    @foreach($years as $key =>$value)
                                        <option value="{{$value->year}}">{{$value->year}}</option>
                                    @endforeach
                                </select>
                                <div class="col-3">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="1" id="Salespaid" onchange="renderSales()">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Paid
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="barchart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Top Products</p>
                        <div class="row d-flex">
                            <button class="btn btn-outline-dark col-2 ml-5"  onclick="renderTopProducts()">Refresh</button>
                            <select class="form-control col-2 mx-2" name="" onchange="renderTopProducts()" id="topProducts" @if($years) value="$years[0]->year" @endif>
                                @foreach($years as $key =>$value)
                                    <option value="{{$value->year}}">{{$value->year}}</option>
                                @endforeach
                            </select>
                            <div class="col-3">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="1" id="TopProductspaid" onclick="renderTopProducts()">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Paid
                                    </label>
                                </div>
                            </div>
                            <div class="col-3 d-flex">
                                <label class="form-label my-auto mx-2" for="flexCheckDefault">
                                        Limit
                                </label>
                                <input class="form-control" type="number" id="topProductLimit" value="10" onchange="renderTopProducts()" min="1" max="20">
                                   
                            </div>
                        </div>
                        <canvas id="topProdChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Drill Analytics</p>
                        <div class="row d-flex">
                            <button class="btn btn-outline-dark col-2 ml-5"  onclick="renderDrillAnalyticsRevenue()">Refresh</button>
                            <select class="form-control col-2 mx-2" name="" onchange="DrillAnalyticsRevenueChangeYear()" id="DrillAnalyticsRevenueYear" @if($years) value="$years[0]->year" @endif>
                                @foreach($years as $key =>$value)
                                    <option value="{{$value->year}}">{{$value->year}}</option>
                                @endforeach
                            </select>
                            <select class="form-control col-2 mx-2" name="" onchange="renderDrillAnalyticsRevenue()" id="DrillAnalyticsRevenueVendor" @if($years) value="$years[0]->year" @endif>
                                <option value="All">All Vendor</option>    
                                @foreach($vendors as $key =>$value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            <div class="col-2">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="1" id="DrillAnalyticsRevenueVendorpaid" onchange="renderDrillAnalyticsRevenue()">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Paid
                                    </label>
                                </div>
                            </div>
                            <select class="form-control col-2 mx-2" name="" onchange="renderDrillAnalyticsRevenue()" id="chatX" value="REVENUE">
                                <option value="REVENUE">REVENUE</option>    
                                <option value="FULFULLEDORDERS">FULFULLED ORDERS</option>   
                            
                            </select>
                        </div>
                        <canvas id="DrillAnalyticschart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Top Seller</p>
                        </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                            <div class="row d-flex">
                                <button class="btn btn-outline-dark col-2 ml-5"  onclick="renderTopSeller()">Refresh</button>
                                <select class="form-control col-2 mx-2" name="" onchange="renderTopSeller()" id="topSellers" @if($years) value="$years[0]->year" @endif>
                                    @foreach($years as $key =>$value)
                                        <option value="{{$value->year}}">{{$value->year}}</option>
                                    @endforeach
                                </select>
                                <div class="col-3">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="1" id="TopSellerpaid" onchange="renderTopSeller()">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Paid
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <canvas id="topSeller"></canvas>
                    </div>
                </div>
            </div>
           
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Top Category</p>
                        </div>
                        <div class="row d-flex">
                            <button class="btn btn-outline-dark col-2 ml-5"  onclick="renderCategory()">Refresh</button>
                            <select class="form-control col-2 mx-2" name="" onchange="renderCategory()" id="topCategory" @if($years) value="$years[0]->year" @endif>
                                @foreach($years as $key =>$value)
                                    <option value="{{$value->year}}">{{$value->year}}</option>
                                @endforeach
                            </select>
                            <div class="col-3">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="1" id="Categorypaid" onchange="renderCategory()">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Paid
                                    </label>
                                </div>
                            </div>
                        </div>
                        <canvas id="category"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Fulfilled Orders</p>
                        </div>
                        <div class="row d-flex">
                            <button class="btn btn-outline-dark col-2 ml-5"  onclick="renderFulfilledOrders()">Refresh</button>
                            <select class="form-control col-2 mx-2" name="" onchange="renderFulfilledOrders()" id="FulfilledOrders" @if($years) value="$years[0]->year" @endif>
                                @foreach($years as $key =>$value)
                                    <option value="{{$value->year}}">{{$value->year}}</option>
                                @endforeach
                            </select>
                            <div class="col-3">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="1" id="OrderStatuspaid" onchange="renderFulfilledOrders()">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Paid
                                    </label>
                                </div>
                            </div>
                        </div>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="barangay"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Order Status</p>
                        </div>
                        <div class="row d-flex">
                            <button class="btn btn-outline-dark col-2 ml-5"  onclick="renderStatus()">Refresh</button>
                            <select class="form-control col-2 mx-2" name="" onchange="renderStatus()" id="orderStatus" @if($years) value="$years[0]->year" @endif>
                                @foreach($years as $key =>$value)
                                    <option value="{{$value->year}}">{{$value->year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <canvas id="sellTrough"></canvas>
                    </div>
                </div>
            </div>
            
	</div>
</div>
@endsection
