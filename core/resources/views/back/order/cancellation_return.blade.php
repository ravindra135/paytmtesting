@extends('master.back')
@section('styles')
	<link rel="stylesheet" href="{{asset('assets/back/css/datepicker.css')}}">
@endsection
@section('content')



<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 bc-title"><b>{{request()->input('type') ? request()->input('type') : __('All')}} Cancelled Or Return {{ __('Orders') }}</b></h3>
                <div class="right">
               <!-- <a href="{{route('back.csv.order.export')}}" class="btn btn-info btn-sm d-inline-block">{{__('CSV Export')}}</a>-->
                  
              </div>
              </div>
        </div>
    </div>

	<!-- DataTales -->
	<div class="card shadow mb-4">
		<div class="card-body">

      

			@include('alerts.alerts')
			<div class="gd-responsive-table">
				<table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">

					<thead>
						<tr>
              <th> <input type="checkbox" data-target="order-bulk-delete" class="form-control bulk_all_delete"> </th>
              <th>{{ __('Order ID') }}</th>
              <th>User</th>
              <th>Status</th>
              <th>Reason</th>
              <th>Details</th>
              <th>Order Action</th>
              <th> Action</th>
							<th>Created </th>
              <th>Updated </th>

						</tr>
					</thead>

					<tbody>
@foreach($datas as $data)
<tr id="order-bulk-delete">
  <td><input type="checkbox" class="bulk-item" value="{{$data->id}}"></td>

    <td title="OrderId:{{ $data->order_id}},  Database ID:- {{ $data->id}}">
    <a target="_blank" href="{{url('/admin/order/invoice')}}/{{$data->order_id}}">   {{ $data->Order->orderNumber}}
    </td>
    <td>
        {{ $data->Order->User->first_name}}
    </td>

    <td>
      @if ($data->status == 1)

      <span class="badge badge-pill badge-primary">Order Cancelled</span>

      @else
  <span class="badge badge-pill badge-danger">Order Return</span>
@endif
    </td>
 <td>
        {{ $data->reason}}
    </td>

 <td>
        {{ $data->notes}}
    </td>

    <td>
        <div class="dropdown">
            <button class="btn {{ $data->order_status  }}  btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ $data->admin_status  }}
            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
            

                <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="{{ route('back.order.status',[$data->Order->id,'order_status','Canceled']) }}">{{ __('Cancel') }}</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="{{ route('back.order.status',[$data->Order->id,'order_status','Return']) }}">{{ __('Return') }}</a>

            </div>
          </div>
    </td>
    <td>
        <div class="action-list">
           <!-- <a class="btn btn-secondary btn-sm"
                href="{{url('/admin/order/invoice')}}/{{$data->order_id}}">
                <i class="fas fa-eye"></i>
            </a>-->

            <a class="btn btn-danger btn-sm " data-toggle="modal"
                data-target="#confirm-delete" href="javascript:;"
                data-href="{{ route('back.order.cancellation_return_delete',$data->id) }}">
                <i class="fas fa-trash-alt"></i>
            </a>
           
        </div>
    </td>
      <td>  {{ $data->created_at->diffForHumans() }}</td>
    <td>
        <td>  {{ $data->updated_at->diffForHumans() }}</td>
</tr>
@endforeach
					</tbody>

				</table>
			</div>
		</div>
	</div>

</div>



{{-- STATUS MODAL --}}

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

		<!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('Update Status?') }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			{{ __('You are going to update the status.') }} {{ __('Do you want proceed?') }}
		</div>

		<!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
            <a href="" class="btn btn-ok btn-success">{{ __('Update') }}</a>
		</div>

      </div>
    </div>
  </div>

{{-- STATUS MODAL ENDS --}}
{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

  <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirm Delete?') }}</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
  </div>

  <!-- Modal Body -->
      <div class="modal-body">
        {{ __('You are going to delete this order. All contents related with this order will be lost.') }} {{ __('Do you want to delete it?') }}
  </div>

  <!-- Modal footer -->
      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
    <form action="" class="d-inline btn-ok" method="POST">

      @csrf
      @method('DELETE')
   <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>

    </form>
  </div>

    </div>
  </div>
</div>

{{-- DELETE MODAL ENDS --}}

@endsection
