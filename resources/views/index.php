<!DOCTYPE html>
<html lang="en" ng-app="my-app">
<head>
	<meta charset="UTF-8" />
	<title>Laravel 5.2 & Angular JS</title>
	<!-- Load Bootstrap CSS -->
	<link type="text/css" rel="stylesheet" href="<?php echo asset('template/css/bootstrap.min.css'); ?>" />
	<link type="text/css" rel="stylesheet" href="<?php echo asset('template/css/style.css'); ?>" />
</head>
<body>
	<div class="container" ng-controller="MemberController">
		<h2>MEMBER'S LIST :{{ ten }}</h2>

		<form>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-search"></i></div>
					<input type="text" class="form-control" placeholder="Search everything" ng-model="searchhere">
				</div>
			</div>
		</form>


		<table class="table table-bordered">
			<thead>
				<tr>
					<th>
						<a href="#" ng-click="sortType = 'id'; sortReverse = !sortReverse">
							ID
							<span ng-show="sortType == 'id' && !sortReverse" class="fa fa-caret-down"></span>
							<span ng-show="sortType == 'id' && sortReverse" class="fa fa-caret-up"></span>
						</a>
					</th>
					<th width="30%">
						<a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
							Name
							<span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
							<span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
						</a>
					</th>
					<th>
						<a href="#" ng-click="sortType = 'age'; sortReverse = !sortReverse">
							Age
							<span ng-show="sortType == 'age' && !sortReverse" class="fa fa-caret-down"></span>
							<span ng-show="sortType == 'age' && sortReverse" class="fa fa-caret-up"></span>
						</a>
					</th>
					<th>
						<a href="#" ng-click="sortType = 'address'; sortReverse = !sortReverse">
							Address
							<span ng-show="sortType == 'address' && !sortReverse" class="fa fa-caret-down"></span>
							<span ng-show="sortType == 'address' && sortReverse" class="fa fa-caret-up"></span>
						</a>
					</th>
					<th width="10%"><button id="btn-add" class="btn btn-primary btn-xs" ng-click="modal('add')">Add member</button></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="mem in members | orderBy:sortType:sortReverse | filter:searchhere"">
					<td>{{ mem.id }}</td>
					<td>{{ mem.name }}</td>
					<td>{{ mem.age }}</td>
					<td>{{ mem.address }}</td>
					<td>
						<button class="btn btn-default btn-xs btn-detail" id="btn-edit" ng-click="modal('edit',mem.id)">Sửa</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(mem.id)">Xóa</button>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!-- Modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">{{ frmTitle }}</h4>
			  </div>
			  <div class="modal-body">
				<form name="frmMember" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="Please enter your name" ng-model="member.name" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmMember.name.$error.required">Vui lòng nhập họ tên</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Age</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="age" name="age" placeholder="Please enter your age" ng-model="member.age" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmMember.age.$error.required">Please enter your age</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Address</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="address" name="address" placeholder="Please enter your address" ng-model="member.address" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmMember.address.$error.required">Please enter your Address</span>
						</div>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-disabled="frmMember.$invalid" ng-click="save(state,id)">Lưu</button>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>

	<!-- Load Bootstrap JS -->
	<script type="text/javascript" src="<?php echo asset('template/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo asset('template/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo asset('app/lib/angular.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo asset('app/app.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo asset('app/controllers/MemberController.js'); ?>"></script>
</body>
</html>