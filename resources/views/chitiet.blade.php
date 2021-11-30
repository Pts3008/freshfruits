@extends('header')
@section('content')
<!-- product -->
<div class="container ">

	<h4 class="list-product-title mt-3">Chi tiết {{$sanpham->tensp}}</h4>

	<div class="product-group">
		<div class="row">

			<div class="col-md-6">
				<div  style="width:380px;">
					<img src="{{url('public')}}/img/{{$sanpham->image}}" class="card-img-top" alt="...">

				</div>
			</div>
			<div class="col-md-6">
				<div >
					<div class="card-body">
						<h5 class="card-title">{{$sanpham->tensp}}</h5>
						<p class="card-text">{{$sanpham->gia}}VND</p>
						<a href="{{route('themgiohang2',$sanpham->id)}}" class="btn btn-primary">Thêm giỏ hàng</a>

					</div>
				</div>
				@if(Auth::check())
				<div class="container">
					<div class="row list-product">
						<div class="col-md-12">
							<h3>Bình Luận</h3>
							<div class="col-md-12" style="padding: 0px;">
								<form action="" method="post" role="form">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="form-group">
										<code><b style="font-size:15px;">Viết nội dung bình luận ...<span class="glyphicon glyphicon-pencil"></span></b></code>
										<textarea name="noidung" id="content"rows="5" class="form-control"></textarea>
									</div>
									<button type="submit" class="btn btn-primary">Gửi Bình luận</button>
									@csrf
								</form>
							</div>
						</div>
					</div>
				</div>
				@endif	
			</div>

		</div>


	</div>

</div>
<!--end product -->
<div class="container mt-5">
	<h5>Danh sách bình luận</h5>
	<table class="table">

		<tbody>
			@foreach($binhluan as $bl)
			<tr>

				<td>{{$bl->user->name}}</td>
				<td>{{$bl->noidung}}</td>
				@if(Auth::check())
				@if(($bl->id == Auth::user()->id)||(($bl->user->isAdmin)==(Auth::user()->isAdmin !=3)))
				<td>
					<form  action="{{route('binhluan.destroy',$bl->id_bl)}}" method="POST">
						@method('DELETE')
						@csrf
						<button class="btn btn-danger">Xóa</button>            
					</form></td>
					@endif
 				
					@endif
				</tr>
				@endforeach


			</tbody>
		</table>
		<div class="row">{{$binhluan->links()}}</div>
	</div>
	@endsection