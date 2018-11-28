<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card border-light">
				<div class="card-header">
					<h5 class="mb-0">Books</h5>
				</div>
				<div class="card-body">
					<div class="table-data-toolbar">
						<a href="<?php echo base_url('dashboard/book/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a>
					</div>
					<table class="table-data"></table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){
		$('.table-data').bootstrapTable({
			toolbar: ".table-data-toolbar",
			classes: 'table table-striped table-no-bordered',
			search: true,
			showRefresh: true,
			// showToggle: true,
			// showColumns: true,
			// showExport: true,
			// showPaginationSwitch: true,
			pagination: true,
			pageList: [10, 25, 50, 100, 'ALL'],
			// showFooter: false,
			sidePagination: 'server',
			url: "<?php echo base_url('dashboard/book/json') ?>",
			columns: [
                {
                    field: 'id',
                    title: 'Action',
                    formatter: function(value, row, index){
                    	return `<div class="row p-3">
			                    	<div class="col-md-2">
			                    		<img src="${base_url('assets/uploads/cover_img/' + row.cover_img)}" class="img-fluid mb-3" alt="" />
			                    	</div>
			                    	<div class="col-md-10">
			                    		<div class="row">
			                    			<div class="col-md-6 mb-3 mt-2">
												<h4>${row.title}</h4>
			                    			</div>
			                    			<div class="col-md-6 mb-3 text-md-right">
												<a href="" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
												<a href="" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
			                    			</div>
			                    		</div>
			                    		<div class="row">
											<div class="col-md-4">
												<dl>
												    <dt>Author</dt>
												    <dd>${row.first_name + ' ' + row.middle_name + '' + row.last_name}</dd>
												    <dt>Publisher</dt>
												    <dd>${row.publisher}</dd>
											  	</dl>
											</div>
											<div class="col-md-4">
												<dl>
													<dt>ISBN/ISSN</dt>
												    <dd>${row.isbn_issn}</dd>
												    <dt>Language</dt>
												    <dd>${row.language}</dd>
												    
											  	</dl>
											</div>

											<div class="col-md-4">
												<dl>
													<dt>Category</dt>
												    <dd>${row.category}</dd>
												    <dt>Topic</dt>
												    <dd>${row.topic}</dd>
											  	</dl>
											</div>
			                    		</div>
			                    		
			                    		
			                    	</div>

			                    	
		                    	</div>`;
                    	return `<a href="${base_url('dashboard/book/edit/' + value)}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    			<a href="${base_url('dashboard/book/delete/' + value)}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>`;
                    }
                },
                // {
                // 	field: 'title',
                // 	title: 'Title'
                // },
                // {
                // 	field: 'publication_year',
                // 	title: 'Publication Year'
                // }
            ]
		});
	});
</script>