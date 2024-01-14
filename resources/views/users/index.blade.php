@extends('../layouts/backend_layout')

@section('title','User Page')

@section('content')
<div class="col-lg-12 stretch-card">
  @include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
        <div id="add-new-properties"></div>
        <div class="row col-lg-12" style="display: flex;text-align:center;">
        
          <div class="col-lg-12">
            
            <div class="btn btn-gradient-primary" style="display: flex;">
              <label for="exampleFormControlSelect2">Select Action </label>
              <select class="form-control " style="width: 100%;" id="exampleFormControlSelect2">
                <option> - </option>
                <option> <a href="">Add User</a> </option>
                <option> <a href="">Export Excel User</a> </option>
                <option> <a href="">Import Excel User</a> </option>
                <option> <a href="">Export CSV User</a> </option>
                <option> <a href="">Import CSV User</a> </option>
                <option> <a href="">Export PDF User</a> </option>
              </select>
            </div>

          </div>
          
          <span class="col-lg-122">
              <a type="button" class="btn btn-gradient-primary btn-fw collapsible" style="width: 100%">Advanced Search</a>
              <div class="content" style="display: none; padding:20px; background-color:indigo;">
                  <div class="row">
                      <div class="col-6" style="margin-top:10px">
                          <input type="text" name="name" class="form-control searchName" placeholder="Search for Name Only...">
                      </div>
                      <div class="col-6" style="margin-top:10px">
                          <input type="text" name="email" class="form-control searchEmail" placeholder="Search for Email Only...">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-6" style="margin-top:10px">
                          <input type="text" name="role_id" class="form-control searchRoleId" placeholder="Search for Role Only...">
                      </div>
                      <div class="col-6" style="margin-top: 10px">
                          <select name="status" class="form-select searchStatus">
                              <option value="">Select Status</option>
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>
                          </select>
                      </div>
                  </div>
              </div>
          </span>


        </div>

        
        <table class="table table-bordered" id="datatable-crud">
          <thead>
             <tr>
                {{-- <th>Id</th> --}}
                <th>Name</th>
                <th>Image</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
             </tr>
          </thead>
       </table>
        
      </div>
    </div>
  </div>
@endsection

@push('css')

<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@endpush

@push('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
     
  $(document).ready( function () {
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    
    $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('users-list') }}",
            columns: [
                     { data: 'name', name: 'name' },
                     {
                        data: 'image', 
                        name: 'image',
                        render: function (data, type, row) {
                              if (data) {
                                return `<img src="{{ asset('${data}')}}" class="rounded" style="width: 50px;height:50px; ">`;
                              } else {
                                return `<img src="{{ asset('avatar-3d/man4.png')}}" class="rounded" style="width: 50px;height:50px; ">`;
                              }
                        },
                      },
                     { data: 'email', name: 'email' },
                     { data: 'role_name', name: 'role_name' },
                     {data: 'action', name: 'action', orderable: false},
                  ],
                  initComplete: function () {
                      // Place the DataTable on the top of the table
                      $('#add-new-properties').prepend($('#add-new-properties').find('.dataTables_wrapper'));
                  },
                  order: [[1, 'asc']]
        });
 
        $('body').on('click', '.delete', function () {
    
            if (confirm("Delete Record?") == true) {
            var id = $(this).data('id');
              
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ url('delete-user') }}",
                data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                dataType: 'json',
                success: function(res){
    
                  var oTable = $('#datatable-crud').dataTable();
                  oTable.fnDraw(false);
                }
            });
            }
    
    });


  });
 
</script>

{{-- //collapse --}}
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
</script>
    
@endpush