@extends('backend.master.master')
@section('title', 'Order')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn đặt hàng chưa đóng gói</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
                                <a href="/admin/package/unfinished" class="btn btn-danger">Đơn chưa đóng gói</a>
                                <a href="/admin/package/edit" class="btn btn-warning">Đơn đã đóng gói</a>
                                <a href="/admin/package/transport" class="btn btn-primary">Đơn đang giao</a>
                                <a href="/admin/package/successful" class="btn btn-success">Đơn đã giao thành công</a>
                                {{-- <a href="/admin/order/cancel" class="btn btn-danger">Đơn đã hủy</a> --}}
                                {{-- <form action="">
                                    Tìm kiếm
                                    <input  type="date" value="{{$search}}" name="search" >
                                    <button>ok</button>
                                </form> --}}
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Tên khách hàng</th>
											<th>Sđt</th>
											<th>Địa chỉ</th>
                                            <th>Thời gian</th>
                                            <th>Đóng gói</th>
											<th>Xử lý</th>
										</tr>
									</thead>
									<tbody>
										@foreach($order as $val)
										<tr>
											<td>{{ $val->id }}</td>
											<td>{{ $val->full }}</td>
											<td>{{ $val->phone }}</td>
											<td>{{ $val->address }}</td>
                                            <td>{{ Carbon\Carbon::parse($val->updated_at)->format('m-d-Y') }}</td>
                                            <td>
                                                @if($val->trangthai == 1)
                                                <a class="btn btn-warning" href="#" role="button">Đã đóng gói</a>
                                                @elseif($val->trangthai == 2)
                                                <a class="btn btn-primary" href="#" role="button">đang giao</a>
                                                 @elseif($val->trangthai == 3)
                                                <a class="btn btn-success" href="#" role="button">thành công</a>
                                                @else
                                                <a class="btn btn-danger" href="#" role="button">Chưa đóng gói</a>
                                            @endif

                                            </td>
											<td>
												<a href="/admin/package/detail/{{ $val->id }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Xử lý</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
						<div align='right'>
							{{ $order->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
@endsection
