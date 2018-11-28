
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Katalog</h5>
	</div>
	<div class="card-body">
		<div class="table-data-toolbar">
			<a href="<?php echo base_url('dashboard/bibliography/catalog/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
		</div>
		<table class="table-data"></table>
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
			url: "<?php echo base_url('dashboard/bibliography/catalog/json') ?>",
			columns: [
                {
                    field: 'id',
                    title: 'Action',
                    formatter: function(value, row, index){
                        return `<a href="${base_url('dashboard/bibliography/catalog/edit/' + value)}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    	        <a href="${base_url('dashboard/bibliography/catalog/delete/' + value)}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    			<a href="${base_url('dashboard/bibliography/collection/create/' + value)}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambah Koleksi</a>`;
                    }
                },
                
                {
                    field: 'title',
                    title: 'Title',
                    sortable: true,
                },
                {
                    field: 'edition',
                    title: 'Edition',
                    sortable: true,
                },
                {
                    field: 'cover_image',
                    title: 'Cover Image',
                    formatter: function(value, row, index){
                        console.log(value);
                        return `<img src="${base_url('uploads/book/' + value)}" alt="" style="width: 100px;"/>`
                    }
                },
                {
                    field: 'pdf_file',
                    title: 'PDF',
                    formatter: function(value, row, index){
                        if(value){
                            return `<a class="text-danger" href="${base_url('uploads/book/' + value)}" target="_blank"><i class="fa fa-file-pdf-o fa-2x"></i></a>`;
                        }
                    }
                },
                {
                    field: 'collection_number',
                    title: 'Jumlah Koleksi',
                    sortable: true,
                },
                {
                    field: 'created_at',
                    title: 'Dibuat pada',
                    sortable: true,
                },
                {
                    field: 'updated_at',
                    title: 'Diubah pada',
                    sortable: true,
                },
            ]
		});
	});
</script>