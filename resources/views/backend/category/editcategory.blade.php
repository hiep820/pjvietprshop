@extends('backend.master.master')
@section('title', 'Edit Category')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<form method="post">
									@csrf
									<div class="form-group">
										<label for="">Danh mục cha:</label>
										<select class="form-control" name="parent" >
											<option value="0">----ROOT----</option>
											{{ getCategory($categorys, 0, "", $cate->parent) }}
										</select>
									</div>
									<div class="form-group">
										<label for="">Tên Danh mục</label>
										<input type="text" class="form-control" name="name"  placeholder="Tên danh mục mới" value="{{ $cate->name }}">
										{!! showError($errors, 'name') !!}
										@if(session('error'))
										<div class="alert bg-danger" role="alert">
											<svg class="glyph stroked cancel">
												<use xlink:href="#stroked-cancel"></use>
											</svg>{{ session('error') }}
										</div>

										@endif
									</div>
									<button type="submit" class="btn btn-primary">Sửa danh mục</button>
								</form>
							</div>
							<div class="col-md-7">
								@if(session('thongbao'))
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>{{ session('thongbao') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
								@endif
								<h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
								<div class="vertical-menu">
									<div class="item-menu active">Danh mục </div>
									{{ showCategory($categorys, 0, "", 0) }}

								</div>
							</div>
						</div>
					</div>
				</div>



			</div>
			<!--/.col-->


		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
	<script>
		$('#calendar').datepicker({});

		! function ($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function () {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
@endsection
@section('script')
@parent
<script>
	function del_category(){
		return confirm("Bạn có muốn xóa danh mục?");
	}
</script>
@endsection
