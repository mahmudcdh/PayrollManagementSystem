@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="mb-3">
                    <div class="card">
                        <div class="card-header">Summary</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row text-center">
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="card-header text-bg-primary">Total</div>
                                    <div class="card-body text-bg-primary">3</div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="card-header text-bg-info">Pending</div>
                                    <div class="card-body text-bg-info">4</div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="card-header text-bg-secondary">Approved</div>
                                    <div class="card-body text-bg-secondary">2</div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="card-header text-bg-danger">Reject</div>
                                    <div class="card-body text-bg-danger">1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3" id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#collapseTwo" type="button"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                Leave Balance
                            </button>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Allowance Per Year (days)</th>
                                        <th>Used (days)</th>
                                        <th>Remaining (days)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Type</td>
                                        <td>Allowance Per Year (days)</td>
                                        <td>Used (days)</td>
                                        <td>Remaining (days)</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-2" id="myApp">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#collapseThree" type="button"
                                    aria-expanded="false" aria-controls="collapseThree">
                                My Applications
                            </button>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#myApp">
                            <div class="card-body">
                                <table id="appList" class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Apply Date</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Leave Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        getAppList()
        async function getAppList(){
            let res = await axios.get('/user/appList')
            let appList = $('#appList')
            let tbody = $('#tbody')

            tbody.empty()
            res.data.forEach(function (item, index){
                let row = (`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item['created_at']}</td>
                        <td>${item['fm_date']}</td>
                        <td>${item['to_date']}</td>
                        <td>${item['leave_id']}</td>
                        <td>${item['status']}</td>
                    </tr>
                `)
                tbody.append(row)
            })

        }
    </script>

@endsection
