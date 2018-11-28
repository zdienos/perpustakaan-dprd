
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Tipe Keanggotaan</h5>
	</div>
	<div class="card-body">
		<div class="table-data-toolbar">
			<a href="<?php echo base_url('dashboard/member/membertype/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
			url: "<?php echo base_url('dashboard/member/membertype/json') ?>",
			columns: [
                {
                    field: 'id',
                    title: 'Action',
                    class: 'text-nowrap',
                    formatter: function(value, row, index){
                    	return `<a href="${base_url('dashboard/member/membertype/edit/' + value)}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    			<a href="${base_url('dashboard/member/membertype/delete/' + value)}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>`;
                    }
                },
                {
                    field: 'name',
                    title: 'Nama',
                    sortable: true,
                },
                {
                	field: 'loan_limit',
                	title: 'Jumlah Pinjaman,',
                	sortable: true
                },
				{
					field: 'loan_periode',
					title: 'Lama Peminjamana',
					sortable: true
				},
				{
					field: 'enable_reserve',
					title: 'Reservasi',
					sortable: true
				},
				{
					field: 'reserve_limit',
					title: 'Jumlah Reservasi',
					sortable: true
				},
				{
					field: 'member_periode',
					title: 'Masa Keanggotaan',
					sortable: true
				},
				{
					field: 'reborrow_limit',
					title: 'Kali Perpanjangan',
					sortable: true
				},
				{
					field: 'fine_each_day',
					title: 'Denda Per Hari',
					sortable: true
				},
				{
					field: 'grace_periode',
					title: 'Toleransi Keterlambatan',
					sortable: true
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