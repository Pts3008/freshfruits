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
        @if(Auth::check())
        @if(Auth::user()->isAdmin == 1)
				<a href="{{route('sanpham.index')}}" class="list-group-item list-group-item-action">Danh sách sản phẩm</a>
        
				<a href="{{route('taikhoan.index')}}" class="list-group-item list-group-item-action">Quản lý tài khoản</a>
        @endif
        @endif
				<a href="{{route('khuyenmai.index')}}" class="list-group-item list-group-item-action">Quản lý khuyến mại</a>
			  
			</ul>
		</div>
		

	</div>
</body>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>