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

		function confirmDelete() {
			var conf = confirm("Are you sure you want to delete this record?");
			if(conf) {
				return true;
			}
			return false;
		}

		$('.btn-delete-record').on('click', confirmDelete);
		$('.form-delete-record').on('submit', confirmDelete);

		$('#add-new-category-button').on('click', function(e) {
			e.preventDefault();
			var newCatTitle = $('#new-category').val();
			if(! newCatTitle) {
				$('#new-category').focus();
			} else {
				var token = $(this).data('token');
				$.ajax({
					method: 'post',
					url: '/categories',
					data: {
						_token: token,
						newCatTitle: newCatTitle
					},
					success: function(data) {
						console.log(data['id']);
						if(data == 'duplicate') {
							$('.alert-warning').fadeIn().delay(1000).fadeOut();
						} else {
							var newCatId = data['id'];
							var newCatTitle = data['title'];
							var newCatCheckBox = '<div class="checkbox category-select-checkbox">';
							newCatCheckBox += '<label class="sub-label">';
							newCatCheckBox += '<input type="checkbox" value="' + newCatId + '"';
							newCatCheckBox += 'name="categories[]" checked>'+ newCatTitle +'</label></div>';

							$('#category-select-div > .category-select-checkbox:first-child').before(newCatCheckBox);
						}
					},
					error: function (error) {
						console.log("Error: ");
						console.log(error);
						// $('.alert-danger').fadeIn();
					}
				});
			}
		});
	});
})(jQuery);