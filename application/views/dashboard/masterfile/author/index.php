
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Pengarang</h5>
	</div>
	<div class="card-body">
		<div class="table-data-toolbar">
			<a href="<?php echo base_url('dashboard/masterfile/author/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
			url: "<?php echo base_url('dashboard/masterfile/author/json') ?>",
			columns: [
                {
                    field: 'id',
                    title: 'Action',
                    formatter: function(value, row, index){
                    	return `<a href="${base_url('dashboard/masterfile/author/edit/' + value)}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    			<a href="${base_url('dashboard/masterfile/author/delete/' + value)}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>`;
                    }
                },
                {
                    field: 'name',
                    title: 'Nama',
                    sortable: true,
                },
                {
                    field: 'type',
                    title: 'Jenis Pengarang',
                    sortable: true,
                    formatter: function(value, row, index){
                    	if(value == 'p'){
                    		return 'Nama Orang';
                    	}

                    	if(value == 'o'){
                    		return 'Badan Organisasi'
                    	}

                    	if(value == 'c'){
                    		return 'Konferensi'
                    	}
                    }
                },
                {
                    field: 'created_at',
                    title: 'Dibuat pada',
                    sortable: true,
                },
                {
                    field: 'update_at',
                    title: 'Diubah pada',
                    sortable: true,
                },
            ]
		});
	});
</script>