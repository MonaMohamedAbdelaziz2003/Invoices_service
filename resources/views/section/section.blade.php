@extends('layouts.master')
@section('title')
category
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
{{--  --}}
<!---Internal Owl Carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between pb-2">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> Setting </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/section</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
			<!-- row -->

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
            <div class="row">

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">Add section</a>
                </div>


                <div class="col-xl-12">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table key-buttons text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0"> operations</th>
                                            <th class="border-bottom-0"> Description </th>
                                            <th class="border-bottom-0"> category Name</th>
                                            <th class="border-bottom-0">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0 ?>
                                        @foreach ($section as $item)
                                        <?php $i++ ?>
                                        <tr>
                                            <td>
                                                {{-- @can('تعديل قسم') --}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-id="{{ $item->id }}" data-section_name="{{ $item->section_name }}"
                                                        data-description="{{ $item->description }}" data-toggle="modal"
                                                        href="#exampleModal2" title="edit"><i class="las la-pen"></i>
                                                    </a>
                                                {{-- @endcan --}}

                                                {{-- @can('حذف قسم') --}}
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{ $item->id }}" data-section_name="{{ $item->section_name }}"
                                                        data-toggle="modal" href="#modaldemo9" title="delete">
                                                        <i class="las la-trash"></i>
                                                    </a>
                                                {{-- @endcan --}}
                                            </td>
                                            {{-- <td>{{$item->description}}</td> --}}
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->section_name}}</td>
                                            <td>{{$i}}</td>
                                        </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" id="modaldemo8">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Add section</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                    type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('section.store') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">name section </label>
                                        <input type="text" class="form-control" id="section_name" name="section_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">notes</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">add</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">exist</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

 <!-- edit -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form action="section/update" method="post" autocomplete="off">
                 {{ method_field('patch') }}
                 {{ csrf_field() }}
                 <div class="form-group">
                     <input type="hidden" name="id" id="id" value="">
                     <label for="recipient-name" class="col-form-label">section name</label>
                     <input class="form-control" name="section_name" id="section_name" type="text">
                 </div>
                 <div class="form-group">
                     <label for="message-text" class="col-form-label">note</label>
                     <textarea class="form-control" id="description" name="description"></textarea>
                 </div>
         </div>
         <div class="modal-footer">
             <button type="submit" class="btn btn-primary">ok</button>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">exist</button>
         </div>
         </form>
     </div>
 </div>
</div>

<!-- delete -->
<div class="modal" id="modaldemo9">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content modal-content-demo">
         <div class="modal-header">
             <h6 class="modal-title">delete section</h6><button aria-label="Close" class="close" data-dismiss="modal"
                 type="button"><span aria-hidden="true">&times;</span></button>
         </div>
         <form action="section/destroy" method="post">
             {{ method_field('delete') }}
             {{ csrf_field() }}
             <div class="modal-body">
                 <p>Are you sure about the deletion process?</p><br>
                 <input type="hidden" name="id" id="id" value="id">
                 <input class="form-control" name="section_name" id="section_name" type="text" readonly>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
                 <button type="submit" class="btn btn-danger">sure</button>
             </div>
     </div>
     </form>
 </div>
</div>
            </div>
            <!--/div-->
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>

<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->

<script src="{{URL::asset('assets/js/modal.js')}}"></script>
{{-- <script src="{{ --}}
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
{{-- update --}}
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
        modal.find('.modal-body #description').val(description);
    })

</script>
{{-- delete  --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })

</script>
@endsection
