@extends('backend.master.master')
@section('title', 'Product')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh kích thước</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh kích thước</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(session('thongbao'))
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>{{ session('thongbao') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
								@endif
								<a href="/admin/product/add" class="btn btn-primary">Thêm size</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>name</th>
											<th>ngày thêm</th>
											<th>ngày update</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($sizes as $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>{{($row->name) }} </td>

                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->updated_at }}</td>
											<td>
												{{-- <a href="/admin/product/edit/{{ $row->id }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onClick="return del_prd('{{ $row->name }}')" href="/admin/product/delete/{{ $row->id }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a> --}}
											</td>

										</tr>

										@endforeach

									</tbody>
								</table>
								{{-- <div align='right'>
									{{ $sizes->links() }}
								</div> --}}
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->
@endsection
{{-- @section('script')
@parent
<script>
	function del_prd(name){
		return confirm("Xác nhận xóa sản phẩm: "+name+"?");
	}
</script>

@endsection --}}

