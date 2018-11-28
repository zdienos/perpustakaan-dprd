<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card border-light">
				<div class="card-header">
					<h5 class="mb-0">Authors</h5>
				</div>
				<div class="card-body">
					<div class="table-data-toolbar">
						<a href="<?php echo base_url('dashboard/author/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a>
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
			url: "<?php echo base_url('dashboard/author/json') ?>",
			columns: [
                {
                    field: 'id',
                    title: 'Action',
                    formatter: function(value, row, index){
                    	return `<a href="${base_url('dashboard/author/edit/' + value)}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    			<a href="${base_url('dashboard/author/delete/' + value)}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>`;
                    }
                },
                {
                    field: 'first_name',
                    title: 'First Name', 
                },
                {
                    field: 'middle_name',
                    title: 'Middle Name', 
                },
                {
                    field: 'last_name',
                    title: 'Last Name', 
                },
                {
                    field: 'biography',
                    title: 'Biography', 
                },
            ]
		});
	});
</script>