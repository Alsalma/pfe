
<!DOCTYPE html>
<html>
<head>
    <title>Parc automobile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    <br />
    <h3 align="center">les Societes de transport</h3>
    <br />
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Ajouter</button>

    </div>
    <br />
    <table id="societe_table" class="table table-bordered" style="width:115%">
        <thead>
     <tr>
    <th>libelle</th>
    <th>adresse</th>
     <th>tel</th>
      <th>fax</th>
       <th>email</th>
        <th>code_postal</th>
         <th>registre_commercial</th>
          <th>matricule_fiscal</th>
         <th>Action</th>
         <th><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button></th>
            </tr>
        </thead>
    </table>
</div>

<div id="societeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="societe_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Ajouter</h4>
                </div>

                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter libelle</label>
                        <input type="text" name="libelle" id="libelle" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Enter adresse</label>
                        <input type="text" name="adresse" id="adresse" class="form-control" />
                    </div>

                       <div class="form-group">
                        <label>Enter tel</label>
                        <input type="text" name="tel" id="tel" class="form-control" />
                    </div>

                       <div class="form-group">
                        <label>Enter fax</label>
                        <input type="text" name="fax" id="fax" class="form-control" />
                    </div>

                        <div class="form-group">
                        <label>Enter email</label>
                        <input type="text" name="email" id="email" class="form-control" />
                    </div>

                     <div class="form-group">
                        <label>Enter code_postal</label>
                        <input type="text" name="code_postal" id="code_postal" class="form-control" />
                    </div>

                       <div class="form-group">
                        <label>Enter registre_commercial</label>
                        <input type="text" name="registre_commercial" id="registre_commercial" class="form-control" />
                    </div>

                       <div class="form-group">
                        <label>Enter matricule_fiscal</label>
                        <input type="text" name="matricule_fiscal" id="matricule_fiscal" class="form-control" />
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="hidden" name="societe_id" id="societe_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
     $('#societe_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('ajaxdata.getdata') }}",
        "columns":[
           { "data": "libelle" },
            { "data": "adresse" },
            { "data": "tel" },
            { "data": "fax" },
            { "data": "email" },
            { "data": "code_postal" },
            { "data": "registre_commercial" },
            { "data": "matricule_fiscal" },
            { "data": "action", orderable:false, searchable: false},
            { "data":"checkbox", orderable:false, searchable:false}


        ]
     });

    $('#add_data').click(function(){
        $('#societeModal').modal('show');
        $('#societe_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
    });

    $('#societe_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('ajaxdata.postdata') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                    $('#form_output').html(data.success);
                    $('#societe_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Data');
                    $('#button_action').val('insert');
                    $('#societe_table').DataTable().ajax.reload();
                }
            }
        })
    });
$(document).on('click', '.edit', function(){
    var id = $(this).attr("id");
    $('#form_output').html('');
    $.ajax({
        url:"{{route('ajaxdata.fetchdata')}}",
        method:'get',
        data:{id:id},
        dataType:'json',
        success:function(data)
        {
            $('#libelle').val(data.libelle);
            $('#adresse').val(data.adresse);
            $('#tel').val(data.tel);
            $('#fax').val(data.fax);
            $('#email').val(data.email);
            $('#code_postal').val(data.code_postal);
            $('#registre_commercial').val(data.registre_commercial);
            $('#matricule_fiscal').val(data.matricule_fiscal);
            $('#societe_id').val(id);
            $('#societeModal').modal('show');
            $('#action').val('Edit');
            $('.modal-title').text('Edit Data');
            $('#button_action').val('update');

        }
    })
});


$(document).on('click', '.delete', function(){
    var id = $(this).attr('id');
    if(confirm("Are you sure you want to Delete this data?"))
    {
        $.ajax({
            url:"{{route('ajaxdata.removedata')}}",
            mehtod:"get",
            data:{id:id},
            success:function(data)
            {
                alert(data);
                $('#societe_table').DataTable().ajax.reload();
            }
        })
    }
    else
    {
        return false;
    }
});

    $(document).on('click', '#bulk_delete', function(){
        var id = [];
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $('.societe_checkbox:checked').each(function(){
                id.push($(this).val());
            });
            if(id.length > 0)
            {
                $.ajax({
                    url:"{{ route('ajaxdata.massremove')}}",
                    method:"get",
                    data:{id:id},
                    success:function(data)
                    {
                        alert(data);
                        $('#societe_table').DataTable().ajax.reload();
                    }
                });
            }
            else
            {
                alert("Please select atleast one checkbox");
            }
        }
    });

});
</script>
</body>
</html>
