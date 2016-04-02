<!DOCTYPE html>
<html ng-app="adminpanel">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>Admin | Buddyassists</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
  <div class="wrapper" ng-controller="FormController" ng-cloak>
    <form name="loginform"  class="form-signin" novalidate  method="post">
        <h2 class="form-signin-heading">Sign In</h2>
         <div class="form-hide text-red" id="login_form_error" >Invalid username or password.</div>
        <label for="Name" class="text-black text-normal">Username</label>
		<input type="name" ng-model="user.username" name="uUsername" class="form-control"  placeholder="Username" required></input>
		<div ng-show="loginform.$submitted || loginform.uUsername.$touched">
			<div ng-show="loginform.uUsername.$error.required" class="text-red">Username is required.</div>
		</div>

        <label for="Password">Password</label>
		<input type="password" ng-model="user.password" name="uPassword" class="form-control" ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/" placeholder="Password" required>
        <div ng-show="loginform.uPassword.$submitted || loginform.uPassword.$touched">
			<span ng-show="loginform.uPassword.$error.required" class="text-red">Password is required.</span>
			<span ng-show="loginform.uPassword.$error.password||loginform.uPassword.$error.pattern" class="text-red">This is not a valid Password.</span>
		</div>

      <button class="btn btn-lg btn-primary btn-block login_btn" type="submit"  ng-click="login_user(user)" ng-disabled="loginform.$invalid" >Login</button>
    </form>
  </div>
</div>
<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<script src="../lib/angular.min.js"></script>
<script src="../lib/jquery.js"></script>
<script src="js/script.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<body>
</html>
