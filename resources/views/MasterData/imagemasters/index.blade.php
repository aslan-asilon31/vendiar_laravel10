@extends('../layouts/backend_layout')

@section('title','Image Master Page')

@section('content')
<div class="col-lg-12 stretch-card">
  @include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
        <button type="button" class="btn btn-gradient-primary btn-fw collapsible" style="width: 100%">Advanced Search</button>
        <div class="content" style="display: none; padding:20px; background-color:indigo;" >
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
        
        <a href="{{ route('imagemasters.create') }}">Add Image</a>
        
        <table class="table table-bordered" id="datatable-crud">
          <thead>
             <tr>
                {{-- <th>Image Id</th> --}}
                <th>Name</th>
                <th>Product Name</th>
                <th>Status Name</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Desc</th>
                <th>Table Name</th>
                <th>Created at</th>
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
            scrollY: '400px', // Set the height of the scrolling area
            scrollX: true,   // Enable horizontal scrolling if needed
            scrollCollapse: true,
            pageLength: 5,
            ajax: "{{ url('imagemasters-list') }}",
            columns: [
                    //  { data: 'image_master_id', name: 'image_master_id' },
                     { data: 'name', name: 'name' },
                     { data: 'product_name', name: 'product_name' },
                     { data: 'status_name', name: 'status_name' },
                     { data: 'category_name', name: 'category_name' },
                     {
                        data: 'image', // Assuming image data is directly available
                        name: 'image',
                        render: function (data, type, row) {
                          return `<img src="{{ Storage::url('public/images/') }}/${data}" class="rounded" style="width: 50px; height: 50px;">`; 
                        },
                      },
                      { data: 'description', name: 'description' },
                      { data: 'table_name', name: 'table_name' },
                      {
                          data: 'created_at',
                          name: 'created_at',
                          render: function (data, type, row) {
                              var date = new Date(data);
                              return new Intl.DateTimeFormat('en-US', {
                                  year: 'numeric',
                                  month: '2-digit',
                                  day: '2-digit',
                                  hour: '2-digit',
                                  minute: '2-digit',
                                  second: '2-digit',
                                  timeZone: 'UTC'
                              }).format(date);
                          },
                      },
                     {data: 'action', name: 'action', orderable: false},
                  ],
                  order: [[1, 'asc']]

        });
 
     $('body').on('click', '.delete', function () {
 
        if (confirm("Delete Record?") == true) {
         var id = $(this).data('id');
          
         // ajax
         $.ajax({
             type:"POST",
             url: "{{ url('delete-imagemaster') }}",
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