@extends('master.back')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0bc-title"><b>{{ __('Manage Manual Reviews') }}</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{route('back.testimonials.add')}}"><i class="fas fa-plus"></i> {{ __('Add') }}</a>
                </div>
        </div>
    </div>


	<!-- DataTales -->
	<div class="card shadow mb-4">
		<div class="card-body">
			@include('alerts.alerts')
			<div class="table-responsive">
				<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                  <thead>
                    <tr>

                  <th>Id</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Created </th>
                    <th>Updated </th>
                  <th>Action</th>

                </tr>
                  </thead>
                    <tbody>
                                                   @foreach($items as $i => $item)
                                                  <tr>
                                                  <td >{{ $item->id }}</td>
                          <td >{{ $item->name }}</td>


                                                   <td >
                                                   @if($item->status=='1')
                                                   <i class="label label-success"> Active</i>
                                                   @else
                                                   <i class="label label-danger"> Inactive</i>
                                                   @endif
                                                    </td>
                                                    <td >{{ $item->created_at->diffForHumans() }}</td>
                                                    <td >{{ $item->updated_at->diffForHumans() }}</td>

                                                      <td >
                                                      <div class="btn-group">
                                                        <a href="{{ url('admin/edit_testimonial/'.$item->id) }}" class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                        <a href="{{ url('admin/delete_testimonial/'.$item->id) }}" class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Remove" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-times"></i></a>

                                                          </div>

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


@endsection
