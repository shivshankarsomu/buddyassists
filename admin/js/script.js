var adminpanel = angular.module('adminpanel',[]);
adminpanel.controller('FormController', ['$scope','$http',function($scope,$http) {
    $scope.login_user = function(user) {
                m_data = new FormData();
                m_data.append('uUsername',$scope.user.username.toLowerCase());
                m_data.append('uPassword',$scope.user.password);
                $.ajax({
                    method  : 'POST',
                    url     : '../controllers/LoginController.php',
                    data    : m_data,
                    processData: false,
                    contentType: false
                }).success(function(data) {
        			if (!data.success) {
                        $('#login_form_error').show();
        			} else {
                        location.pathname = '/buddyassists/admin/page_index.php';
        			}
                });
        }
$scope.logout_user = function() {
            $.ajax({
                method  : 'POST',
                url     : '../controllers/LogoutController.php',
                processData: false,
                contentType: false
            }).success(function(data) {
    			if (data.success) {
                    window.location.href = '/buddyassists/admin/index.php';
    			}
            });
    }
  $scope.upload_image = function() {
			var ext = $("#Imgupload").val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['jpg','jpeg','png','gif','bmp']) == -1 && ext!="") {
				$("#error_form").show();
				$("#resume_invalid").show();
			}else{
				var m_data = new FormData();
				m_data.append('uImgupload',$('input[name=uImgupload]')[0].files[0]);
                $.ajax({
        			method  : 'POST',
        			url     : '../controllers/ImageUploadController.php',
        			data    : m_data,
        			processData: false,
        			contentType: false
        		}).success(function(data) {
                    var response = JSON.parse(data);
        			if (!response.success) {
                        console.log("error");
        			} else {
                        $('#uploaded_image_url').text('http://localhost/buddyassists/admin/' + response.file_path);
        			}
        		});

			}
		}
}]);
