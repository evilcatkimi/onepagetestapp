<div ng-controller="uploadsController">
  <input type="file" name="file" onchange="angular.element(this).scope().uploadImage(this.files)">
</div>

<div ng-controller="uploadsController">
  <img src="url/to/loaderImage" ng-show="showLoader" /> 
  <input type="file" name="file" onchange="angular.element(this).scope().uploadImage(this.files)">
</div>