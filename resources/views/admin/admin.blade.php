<!DOCTYPE html>
<html>
<head>
	{!! Html::style('assets/bootstrap.min.css') !!}
	{!! Html::style('assets/css/style.css') !!}
	{!! Html::style('assets/css/table.css') !!}
	<title>Admin</title>
</head>
<body ng-app="admin">
    <div ng-view></div>
</body>
	@include ('admin/js-components')
</html>