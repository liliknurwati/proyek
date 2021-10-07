<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<style type="text/css">
	body{
		background: #f1f1f1;
	}
</style>
<body>
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-4">
			<div class="card shadow-sm p-3 mb-5 bg-body rounded">
				<div class="card-header mb-0">
					<h3 class="text-center font-weight-bold text-dark">ADMIN PSB ONLINE</h3>
				</div>
				<div class="card-body">
					<form action="adm_proses_login.php" method="POST">
						<div class="mb-3">
							<label>Email</label>
							<input type="email" name="email" placeholder="email" class="form-control" required>
						</div>
						<div class="mb-3">
							<label>Password</label>
							<input type="password" name="password" placeholder="Password" class="form-control" required>
						</div>
						<button class="btn btn-danger" type="reset">Reset</button>
						<hr>
						<div class="d-grid gap-2">
							<button type="submit" name="submit" class="btn btn-primary ">Login</button>
						</div>
						<br>	
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>