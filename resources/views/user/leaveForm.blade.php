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
                        <div class="card-header">Leave Application</div>

                        <div class="card-body">
                            <form action="">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text">From</span>
                                    <input type="date" id="fm_date" name="fm_date" class="form-control">
                                    <span class="input-group-text">To</span>
                                    <input type="date" id="to_date" name="to_date" class="form-control">
                                    <span class="input-group-text">Total Day</span>
                                    <input type="text" id="ttlday" class="form-control" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <label class="input-group-text" for="leaveType">Leave Type</label>
                                    <select class="form-select" id="leaveType" name="leaveType">
                                        <option selected>Choose...</option>
                                    </select>
                                    <label class="input-group-text" for="manager_id">Approve By</label>
                                    <select class="form-select" id="manager_id" name="manager_id">
                                        <option selected>Choose...</option>
                                    </select>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text">Reason</span>
                                    <textarea id="reason" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <button type="button" id="" onclick="appSubmit()" class="btn btn-outline-primary btn-sm">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function (){
          $('#fm_date').on('change', function (){
              dateBetween()
          })

            $('#to_date').on('change', function (){
                dateBetween()
            })
        })

        function dateBetween(){
            let fm_date = new Date($('#fm_date').val())
            let to_date = new Date($('#to_date').val())

            let dayBetween = fm_date.getTime() - to_date.getTime()
            let days = dayBetween/(1000*3600*24)

            //return Math.round(Math.abs(days))
            $('#ttlday').val(Math.round(Math.abs(days))+1)
        }

        getLeaveType()
        async function getLeaveType(){
            let res = await axios.get('/user/getLeaveType')
            let leaveType = $('#leaveType')

            res.data.forEach((item)=>{
                let leaveRow = (`
                    <option value="${item['id']}">${item['code']} - ${item['details']}</option>
                `)
                leaveType.append(leaveRow)
            })

        }

        getHOD()
        async function getHOD(){
            let res = await axios.get('/user/hod')
            let manager_id = $('#manager_id')

            res.data.forEach((item)=>{
                let hodRow = (`
                    <option value="${item['id']}">${item['name']} - ${item['email']}</option>
                `)
                manager_id.append(hodRow)
            })

        }

        async function appSubmit(){
            let fm_date = $('#fm_date').val()
            let to_date = $('#to_date').val()
            let leave_id = $('#leaveType').val()
            let manager_id = $('#manager_id').val()
            let reason = $('#reason').val()

            let formData = new FormData()
            formData.append('fm_date',fm_date)
            formData.append('to_date',to_date)
            formData.append('leave_id',leave_id)
            formData.append('manager_id',manager_id)
            formData.append('reason',reason)

            let res = await axios.post('/user/leave-store',formData)
            if(res.status === 200 && res.data['status'] === 'success'){
                successToast(res.data['message'])
            }else{
                errorToast(res.data['message'])
                // console.log(error $e)
            }

        }


    </script>
@endsection
