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
            var data = $.param($scope.member);
            $http({
                method : 'POST',
                url : url,
                data : data,
                headers : {'Content-Type':'application/x-www-form-urlencoded'}
            })
            .success(function (response) {
                console.log(response);
                location.reload();
            })
            .error(function (response) {
                console.log(response);
                alert('CHECK YOUR LOG');
            });
        }

        if (state == "edit") {
            var url = API + 'edit/' + id;
            var data = $.param($scope.member);
            $http({
                method : 'POST',
                url : url,
                data : data,
                headers : {'Content-Type':'application/x-www-form-urlencoded'}
            })
            .success(function (response) {
                console.log(response);
                location.reload();
            })
            .error(function (response) {
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