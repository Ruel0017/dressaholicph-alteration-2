@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Appointment Approval')

@section('content')

<!-- MODAL SECTION -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL SECTION -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Appointment</h3>
        </div>
        <div class="card-body">
            <table id="AppForApproval" class="table table-bordered table-striped">
                <thead>
                    <tr> 
                        <th scope="col">Name</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointment as $appointments)
                    <tr> 
                        <td>{{$appointments->users->fname . ' ' . $appointments->users->lname}}</td>
                        <td>{{$appointments->clothes->clothesName}}</td>
                        <td>{{$appointments->repair->repairName}}</td>
                        <td>{{$appointments->appointment_date}}</td>
                        <td>{{$appointments->totalAmount}}</td>
                        <td>
                            <button type="button" value="{{$appointments->id}}"  class="approve_appointment btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"> Approve </button>
                            <button type="button" value="{{$appointments->id}}" class="deny_appointment btn btn-danger btn-sm"> Deny </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


@endsection
