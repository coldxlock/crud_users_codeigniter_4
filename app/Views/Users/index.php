<?= $this->extend('layout/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>


<?= $this->section('styles'); ?>
<link rel="apple-touch-icon" sizes="180x180" href="<?= site_url('smartadmin') ?>/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= site_url('smartadmin') ?>/img/favicon/favicon-32x32.png">
<link rel="mask-icon" href="<?= site_url('smartadmin') ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="stylesheet" media="screen, print" href="<?= site_url('smartadmin') ?>/css/datagrid/datatables/datatables.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?= site_url('smartadmin') ?>/css/theme-demo.css">
<link rel="stylesheet" media="screen, print" href="<?= site_url('smartadmin') ?>/css/notifications/toastr/toastr.css">
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    <?= $title ?> </span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    
                    <!-- tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active p-3" data-toggle="tab" href="#tab_default-1" role="tab">
                                <i class="fal fa-table text-success"></i>
                                <span class="hidden-sm-down ml-1">List</span>
                            </a>
                        </li>
                        
                    </ul>
                    <!-- end tabs -->
                    <!-- tab content -->
                    <div class="tab-content pt-4" >
                        <div class="tab-pane fade show active" id="tab_default-1" role="tabpanel">
                            <!-- row -->
                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- datatable start -->
                                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100"></table>
                                    <!-- datatable end -->
                                </div>
                                <div class="col-xl-12" style="display:none">
                                    <hr class="mt-5 mb-5">
                                    <h5>Event <i>logs (AJAX Calls)</i></h5>
                                    <div id="app-eventlog" class="alert alert-primary p-1 h-auto my-3"></div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <div class="tab-pane fade" id="tab_default-2" role="tabpanel">
                            <div class="alert alert-info">
                                <strong>
                                    IE Support
                                </strong>
                                <br>
                                The latest update for Alt-Editor has dropped support for IE in general. We have included the latest version of Alt-editor (catered for SmartAdmin) inside <code>src/custom/plugins/datatables-alteditor/datatables-alteditor-latest.js</code> found only in the HTML flavor. You may switch to this latest version of Alt editor to gain access to the <strong>Support Modifiers</strong> below.
                            </div>
                            <!-- row -->
                           
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end tab content -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>



<?= $this->section('scripts'); ?>
<script src="<?= site_url('smartadmin') ?>/js/notifications/toastr/toastr.js"></script>
<script src="<?= site_url('smartadmin') ?>/js/datagrid/datatables/datatables.bundle.js"></script>
<script>


    $(document).ready(function()
    {
     
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 100,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

                
        
        // Event Lot
        var events = $("#app-eventlog");

        // Column Definitions
        var columnSet = [
        {
            title: "ID",
            id: "id",
            data: "id",
            placeholderMsg: "Automatically generated ID",
            "visible": false,
            "searchable": false,
            type: "readonly",
            editorOnChange: function(content) {
                console.log('Alter .....');
            }
        },
       
        {
            title: "First Name",
            id: "firstname",
            data: "firstname",
            type: "text",
            pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]",
            placeholderMsg: "Ex: Prisco",
            errorMsg: "*First name is required.",
            hoverMsg: "(Optional) - Ex: Prisco",
            unique: false,      
            required: true
        },
        {
            title: "Last name",
            id: "lastname",
            data: "lastname",
            type: "text",
            pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]",
            hoverMsg: "(Optional) - Ex: Cleyton Pinheiro",
            placeholderMsg: "Ex: Cleyton Pinheiro",
            errorMsg: "*Last name is required.",
            unique: false,      
            required: true
        },
        {
            title: "User Email",
            id: "email",
            data: "email",
            type: "text",
            pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$",
            placeholderMsg: "user@domain.com",
            errorMsg: "*Invalid email - Enter valid email.",
            unique: true,
            required: true,
            uniqueMsg: "Email already in use"
        },
        {
            title: "Mobile Number",
            id: "mobile",
            data: "mobile",
            type: "number",
            pattern: "^([0-9]{1,4}|[1-5][0-9]{4}|6[0-4][0-9]{3}|65[0-4][0-9]{2}|655[0-2][0-9]|6553[0-5])$",
            unique: false,
            errorMsg: "*Mobile Number is required.",      
            required: true
        },
        {
            title: "Username",
            id: "username",
            data: "username",
            type: "text",
            pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]",
            unique: true,      
            errorMsg: "*Username is required.",  
            required: true,
            uniqueMsg: "Username already in use"
        },
        {
            title: "Password",
            id: "password",
            data: "password",
            type: "password",
            pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]",
            errorMsg: "*Password is required.", 
            unique: false,      
            required: true,            
            "visible": false,
            "searchable": false,
        },
        {
            title: "Confirm Password",
            id: "confirm_password",
            data: "password",
            type: "password",
            pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]",
            errorMsg: "*Confirm Password is required.", 
            unique: false,      
            required: false,            
            "visible": false,
            "searchable": false,
        },
       
    ]

        /* start data table */
        var myTable = $('#dt-basic-example').dataTable(
        {
            /* check datatable buttons page for more info on how this DOM structure works */
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

            ajax: "<?= site_url() ?>/admin/users/loadUsers",
          
            columns: columnSet,
            /* selecting multiple rows will not work */
            select: 'single',
            /* altEditor at work */
            altEditor: true,
            responsive: true,
            /* buttons uses classes from bootstrap, see buttons page for more details */
            buttons: [
            {
                extend: 'selected',
                text: '<i class="fal fa-times mr-1"></i> Delete',
                name: 'delete',
                className: 'btn-primary btn-sm mr-1'
            },
            {
                extend: 'selected',
                text: '<i class="fal fa-edit mr-1"></i> Edit',
                name: 'edit',
                className: 'btn-primary btn-sm mr-1'
            },
            {
                text: '<i class="fal fa-plus mr-1"></i> Add',
                name: 'add',
                className: 'btn-success btn-sm mr-1'
            },
            {
                text: '<i class="fal fa-sync mr-1"></i> Synchronize',
                name: 'refresh',
                className: 'btn-primary btn-sm'
            }],
            columnDefs: [
            {
                targets: 1,
                render: function(data, type, full, meta)
                {
                    var badge = {
                        "active":
                        {
                            'title': 'Active',
                            'class': 'badge-success'
                        },
                        "inactive":
                        {
                            'title': 'Inactive',
                            'class': 'badge-warning'
                        },
                        "disabled":
                        {
                            'title': 'Disabled',
                            'class': 'badge-danger'
                        },
                        "partial":
                        {
                            'title': 'Partial',
                            'class': 'bg-danger-100 text-white'
                        }
                    };
                    if (typeof badge[data] === 'undefined')
                    {
                        return data;
                    }
                    return '<span class="badge ' + badge[data].class + ' badge-pill">' + badge[data].title + '</span>';
                },
            },
           
        ],

            /* default callback for insertion: mock webservice, always success */
            onAddRow: function(dt, rowdata, success, error)
            {

                const confirm_password = $('input[name="Confirm Password"]').val();
                const password = $('input[name="Password"]').val();               
               
                if (password === '' || confirm_password === '' ) {                  
                    toastr["error"]("Attention! Password field cannot be empty!")
                    return
                }  

                if (password !== confirm_password) {                  
                    toastr["error"]("Attention! Password field needs to be the same as confirm password.")
                    return
                }              

                $.ajax({
                    url: '<?= site_url() ?>/admin/users/createUser',
                    type: 'POST',
                    data: {
                        rowdata,
                        <?= csrf_token() ?> : "<?= csrf_hash() ?>"
                    },
                    async:false
                })
                .done(function(data) {
                    const result = $.parseJSON(data);
                    if (result.status) {
                        toastr["success"](result.message);
                        success(rowdata);
                    } else {
                        toastr["error"]("There was an error trying to save, please try again later!")
                    }
                })
                .fail(function() {
                    toastr["error"]("There was an error trying to save, please try again later!")
                });

            },
            onEditRow: function(dt, rowdata, success, error)
            {
                const confirm_password = $('input[name="Confirm Password"]').val();
                const password = $('input[name="Password"]').val();

                if (password !== confirm_password) {                                      
                    toastr["error"]("Attention! Password field needs to be the same as confirm password.")
                    return
                }
                                
                $.ajax({
                    url: '<?= site_url() ?>/admin/users/updateUser',
                    type: 'POST',
                    data: {
                        rowdata,
                        <?= csrf_token() ?> : "<?= csrf_hash() ?>"
                    },
                    async:false
                })
                .done(function(data) {                   
                    const result = $.parseJSON(data);
                    if (result.status) {
                        toastr["success"](result.message);
                        success(rowdata);
                    } else {
                        toastr["error"]("There was an error trying to save, please try again later!")
                    }
                })
                .fail(function() {              
                    toastr["error"]("There was an error trying to save, please try again later!")
                });
              
            },
            onDeleteRow: function(dt, rowdata, success, error)
            {
                $.ajax({
                    url: '<?= site_url() ?>/admin/users/deleteUser',
                    type: 'POST',
                    data: {
                        rowdata,
                        <?= csrf_token() ?> : "<?= csrf_hash() ?>"
                    },
                    async:false
                })
                .done(function(data) {                   
                    const result = $.parseJSON(data);
                    if (result.status) {
                        toastr["success"](result.message);
                        success(rowdata);
                    } else {
                        toastr["error"]("An error occurred, please try again later!")
                    }
                })
                .fail(function() {              
                    toastr["error"]("An error occurred, please try again later!")
                });
            },
        });

        $('.btn.buttons-selected.btn-primary.btn-sm.mr-1').on('click', function(e){
            e.preventDefault();            
            
            if ($('#password') && $('.modal-title').html() === 'Delete Record') {                
                $('.modal-content').css('display', 'none');
                const password = $('label[for="password"]')
                password.closest('.col-12.mb-2').empty()
                                
            } else {
                if ($('#password')) {
                    $('#password').val('');
                    $('input[name="Confirm Password"]').val('');
                }  
            }

            setTimeout(function(){ 
                $('.modal-content').css('display', 'block');
            }, 100);

            
          
            
        })

      

    });

</script>
<?= $this->endSection(); ?>