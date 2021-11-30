<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN</title>
	<link rel="stylesheet" href="{{url('public')}}/boostrap/bootstrap.min.css">
	
</head>
<body>
	

	<nav class="navbar navbar-dark bg-dark">
		<h4 style="color: white;">Admin</h4>
	</nav>
	<h3 style="margin: 30px;">Sửa sản Phẩm</h3>
  <div class="container">
<form action="{{route('sanpham.update',['sanpham'=>$se->id])}}" method="post">
	@method('PUT')
              
    @csrf

  <div class="form-group">
  	<label for="exampleInputEmail1">Tên sản phẩm</label>
  	<input type="text" name="tensp" id="tensp" class="form-control" value="{{$se->tensp}}" placeholder="Input field">
  </div>
  
  <div class="form-group">
  	<label for="exampleInputEmail1">Link ảnh sản phẩm</label>
  	<input type="text" name="image" id="image" class="form-control" value="{{$se->image}}" placeholder="Input field">
  </div>
  
  <div class="form-group">
  	<label for="exampleInputEmail1">Giá sản phẩm</label>
  	<input type="text" name="gia" id="gia" class="form-control" value="{{$se->gia}}" placeholder="Input field">
  </div>
  
  <div class="form-group">
  	<label for="exampleInputEmail1">Số lượng sản phẩm</label>
  	<input type="text" name="soluong" id="soluong" class="form-control" value="{{$se->soluong}}" placeholder="Input field">
  </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
  
  </form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>