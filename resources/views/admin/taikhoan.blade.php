<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN</title>
	<link rel="stylesheet" href="{{url('public')}}/boostrap/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('resources')}}/css/admin.css">
</head>
<body>
	<body>


		<nav class="navbar navbar-dark bg-dark">
				<a style="color:white;" class="nav-link" href="{{route('index')}}">Trang Chủ</a>	
		</nav>
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
					<a href="{{route('sanpham.index')}}" class="list-group-item list-group-item-action">Danh sách sản phẩm</a>
					<a href="{{route('taikhoan.index')}}" class="list-group-item list-group-item-action">Quản lý tài khoản</a>
					<a href="{{route('khuyenmai.index')}}" class="list-group-item list-group-item-action">Quản lý khuyến mại</a>

				</ul>
			</div>
			<div class="col-md-9">
				
				<a href="{{route('taikhoan.create')}}">
					<button type="button" class="btn btn-lg btn-primary"  style="margin: 18px;">Thêm tài khoản</button></a>
				
					<table class="table">
						<thead>
							<tr>
								<th scope="col">stt</th>
								<th scope="col">tên </th>
								<th scope="col">email</th>
								<th scope="col">chức vụ</th>
								<th scope="col">Quản lý</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($taikhoan as  $tk)
							<tr>
								<th >{{$loop->index+1}}</th>
								<td>{{$tk->name}}</td>
								<td>{{$tk->email}}</td>
								<td>
									@if($tk->isAdmin == 3)
										<p>Khách hàng</p>
									@endif
									@if($tk->isAdmin == 1)
										<p>Quản lý</p>
									@endif
									@if($tk->isAdmin == 2)
										<p>Nhân viên</p>
									@endif
								</td>
								<td style="width: 120px;">
									<form  action="{{route('taikhoan.destroy',$tk->id)}}" method="POST">
										@method('DELETE')
										@csrf
										<button class="btn btn-danger">Xóa</button>            
									</form>

								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>

			</div>
		</body>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</html>