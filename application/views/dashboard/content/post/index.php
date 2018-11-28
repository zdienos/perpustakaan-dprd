<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-light">
                <div class="card-header">
                    <h5 class="mb-0">Post Posts</h5>
                </div>
                <div class="card-body">
                    <div class="table-data-toolbar">
                        <a href="<?php echo base_url('dashboard/content/post/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a>
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
            url: "<?php echo base_url('dashboard/content/post/json') ?>",
            columns: [
                {
                    field: 'id',
                    title: 'Action',
                    class: 'text-nowrap',
                    formatter: function(value, row, index){
                        return `<a href="${base_url('dashboard/content/post/edit/' + value)}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="${base_url('dashboard/content/post/delete/' + value)}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>`;
                    }
                },
                {
                    field: 'title',
                    title: 'Title',
                },
                {
                    field: 'slug',
                    title: 'Slug',
                },
                {
                    field: 'categories',
                    title: 'Categories',
                },
                {
                    field: 'featured_image',
                    title: 'Featured Image',
                    formatter: function(value, row, index){
                        if(value !== null){
                            return '<img src="'+ base_url('uploads/featured_image/' + value) +'" style="width: 100px;"/>'
                        }
                    }
                },
                {
                    field: 'created_at',
                    title: 'Created at',
                },
                {
                    field: 'updated_at',
                    title: 'Updated at',
                }
            ]
        });
    });
</script>