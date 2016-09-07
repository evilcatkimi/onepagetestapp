app.controller('MemberController' ,function ($scope,$http,API) {
    $http.get(API + 'list').success(function (response) {
        $scope.members = response;
    });


    $scope.modal = function (state,id) {
        $scope.state = state
        switch (state) {
            case "add" :
                $scope.frmTitle = "Add";
                break;
            case "edit" :
                $scope.frmTitle = "Edit";
                $scope.id = id;
                $http.get(API + 'edit/' + id).success(function (response) {
                    $scope.member = response;
                });
                break;
            default :
                $scope.frmTitle = "UNKNOW";
                break;
        }
        $("#myModal").modal('show');
    }




    $scope.save = function (state,id) {
        if (state == "add") {
            var url = API + 'add';
            //var data = $.param($scope.member);

            $http({
                method: 'POST',
                url: url,
                headers: {
                    // 'Content-Type': 'multipart/form-data'
                    'Content-Type': undefined
                },
                data: {
                    name: $scope.member.name,
                    age: $scope.member.age,
                    address: $scope.member.address,
                    image: $scope.member.image
                },
                transformRequest: function (data, headersGetter) {
                    var formData = new FormData();
                    angular.forEach(data, function (value, key) {
                        formData.append(key, value);
                    });

                    var headers = headersGetter();
                    delete headers['Content-Type'];

                    return formData;
                }
            })


                .success(function (data) {
                    //alert($scope.member.image);
                    //alert('ok');
                    location.reload();
                    $('#model-form').modal('toggle');//how?
                })
                .error(function (data, status) {
                    console.log(response);
                    alert('Xảy ra lỗi vui lòng kiểm tra log');
                });
        }

        if (state == "edit") {
            var url = API + 'edit/' + id;
            $http({
                method: 'POST',
                url: url,
                headers: {
                    // 'Content-Type': 'multipart/form-data'
                    'Content-Type': undefined
                },
                data: {
                    name: $scope.member.name,
                    age: $scope.member.age,
                    address: $scope.member.address,
                    image: $scope.member.image
                },
                transformRequest: function (data, headersGetter) {
                    var formData = new FormData();
                    angular.forEach(data, function (value, key) {
                        formData.append(key, value);
                    });

                    var headers = headersGetter();
                    delete headers['Content-Type'];

                    return formData;
                }
            })


                .success(function (data) {
                    //alert($scope.member.image);
                    //alert('ok');
                    location.reload();
                    $('#model-form').modal('toggle');//how?
                })
                .error(function (data, status) {
                    console.log(response);
                    alert('Xảy ra lỗi vui lòng kiểm tra log');
                });
        }
    }

    $scope.confirmDelete = function (id) {
        var isConfirmDelete = confirm('Bạn có chắc muốn xóa dòng dữ liệu này hay không');
        if (isConfirmDelete) {
            $http.get(API + 'delete/' + id)
                .success(function (response) {
                    console.log(response);
                    location.reload();
                })
                .error(function(response) {
                    console.log(response);
                    alert('Xảy ra lỗi vui lòng kiểm tra log');
                });;
        } else {
            return false;
        }
    }
});

app.directive('file', function () {
    return {
        scope: {
            file: '='
        },
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var file = event.target.files[0];
                scope.file = file ? file : undefined;
                scope.$apply();
            });
        }
    };
});