(function($) {
	$(function() {
		$('.role').on('change', function (e) {
			e.preventDefault();
			var token = $(this).data('token');
			var userId = $(this).data('id');
			var selectedRoleId = $(this).val();
			// alert(selectedRoleId);
			$.ajax({
				method: 'put',
				url: 'users/' + userId,
				data: {
					_token: token,
					newRole: selectedRoleId
				},
				success: function(data) {
					if(data == 'success') {
						$('.alert-success').fadeIn().delay(1000).fadeOut();
					} else {
						$('.alert-warning').fadeIn();
					}
				},
				error: function () {
					$('.alert-danger').fadeIn();
				}
			});
		});
	});
})(jQuery);