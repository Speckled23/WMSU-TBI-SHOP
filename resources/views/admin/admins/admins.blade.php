@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sellers</h4>
                        <div class='row d-flex justify-content-between'>
                            <a href="javascript:history.back()" class="back-link mx-3">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button class="btn btn-success mx-3" data-toggle="modal" data-target="#downloadSellerModal">Download</button>
                            
                            
                            <div class="modal fade" id="downloadSellerModal" tabindex="-1" role="dialog" aria-labelledby="downloadSellerModalLabel" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="downloadSellerModalLabel">Download</h5>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class=" mt-3" >
                                                EXPORT TYPE
                                            </h6>
                                            <select class="form-control" id="export-type" required aria-label="Default select example">
                                                <option selected value="EXCEL">EXCEL</option>
                                                <option value="CSV">CSV</option>
                                                <option value="PDF">PDF</option>
                                            </select>
                                            <?php $rows = [
                                                ['table_name'=>'Admin ID','column_name'=>'id'],
                                                ['table_name'=>'Name','column_name'=>'name'],
                                                ['table_name'=>'Type','column_name'=>'type'],
                                                ['table_name'=>'Mobile No.','column_name'=>'mobile'],
                                                ['table_name'=>'Email','column_name'=>'email'],
                                                // ['table_name'=>'Admin ID','column_name'=>'password'],
                                                // ['table_name'=>'Admin ID','column_name'=>'image'],
                                                // ['table_name'=>'Admin ID','column_name'=>'confirm'],
                                                ['table_name'=>'Status','column_name'=>'status']
                                            ]
                                            ?>
                                            <h6 class=" mt-3" >
                                                Columns
                                            </h6>
                                            <fieldset id="checkArray" class="mt-2">
                                            @foreach($rows as $key => $value)
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" checked type="checkbox" id="row-{{$value['column_name']}}" value="{{$value['column_name']}}">
                                                        <label class="form-check-label"  for="gridCheck">
                                                            {{$value['table_name']}}
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success " id="downloadSeller">Download</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                            <script>
                                var rows = [
                                @foreach($rows as $key => $value)
                                    @if($loop->last)
                                        '{{$value['column_name']}}'
                                    @else
                                        '{{$value['column_name']}}',
                                    @endif
                                @endforeach
                                ];
                                var column_names = [
                                @foreach($rows as $key => $value)
                                    @if($loop->last)
                                        '{{$value['table_name']}}'
                                    @else
                                        '{{$value['table_name']}}',
                                    @endif
                                @endforeach
                                ];
                                var export_type;
                                var columns = [];
                                $('#downloadSeller').click(function(e){
                                    export_type = $('#export-type').val();
                                    columns = [];
                                    temp_column_names = [];
                                    for (let index = 0; index < rows.length; index++) {
                                        const element = rows[index];
                                        console.log(element)
                                        if($('#row-'+element).is(':checked')){
                                            columns.push(element);
                                            temp_column_names.push(column_names[index]);
                                        }
                                    }
                                    var encoded_columns = encodeURIComponent(JSON.stringify(columns));
                                    var encoded_column_names = encodeURIComponent(JSON.stringify(temp_column_names));
                                    e.preventDefault();  //stop the browser from following
                                    window.location.href = '/admin/ExportSeller/'+export_type+'/'+encoded_columns+'/'+encoded_column_names;
                                    //  $.ajax({url: '/admin/ExportSeller/EXCEL/', 
                                    //      success: function(result){
                                    //          alert(result)
                                    //      }
                                    //  });
                                 });
                            </script>
                        </div>
                        <!-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> -->
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Admin ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th>
                                            Mobile No.
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($admins as $admin)
                                    <tr>
                                        <td>
                                            {{ $admin['id'] }}
                                        </td>
                                        <td>
                                            {{ $admin['name'] }}
                                        </td>
                                        <td>
                                            {{ $admin['type'] }}
                                        </td>
                                        <td>
                                            {{ $admin['mobile'] }}
                                        </td>
                                        <td>
                                            {{ $admin['email'] }}
                                        </td>
                                        <td>
                                            @if($admin['image']!="")
                                            <img src="{{ asset('admin/images/photos/'.$admin['image']) }}">
                                            @else
                                             <img src="{{ asset('admin/images/photos/no-image.gif') }}">
                                            @endif
                                        </td>
                                        <td>
                                            @if($admin['status']==1)
                                              <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                            @else
                                              <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($admin['type']=="vendor")
                                              <a href="{{ url('admin/view-vendor-details/'.$admin['id']) }}"><i style="font-size:25px;" class="mdi mdi-file-document"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                   @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer> -->
    <!-- partial -->
</div>
@endsection