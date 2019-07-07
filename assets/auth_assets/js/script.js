$(function() {
    
	$('.showEditModal').on('click', function() {

		$('#newSubMenuModalLabel').html('Ubah Sub Menu');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('.modal-body form').attr('action','http://localhost/wpu-login/menu/submenu');   
		
		//mendapatkan data id 
		const id = $(this).data('id');
		
		//menjalankan ajax
		//ambil data dari url
		$.ajax({			
			url: 'http://localhost/wpu-login/menu/submenu/getSub',
			data: {id : id},
			method: 'post',
			dataType: 'json', 			
			success: function(data) {	
				console.log(data);
				$('#title').val(data.title);
				$('#menu').val(data.menu);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
                $('#is_active').val(data.is_active);
				$('#id').val(data.id);				
			}
			
		}); 
		
	});

});
