@extends('../../layouts/backend_layout')

@section('title','Image Master')
@section('title_sub','create Image Master Page')

@section('content')
<div class="col-lg-12 stretch-card">

    <div class="card">
      <div class="card-body">

           
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
   @endif

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('imagemasters.index') }}" enctype="multipart/form-data"> Back</a>
    </div>

<form action="{{ route('imagemasters.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  

    <div class="row">
        

        <div class="col-md-6">

          <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="name">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
              <strong>Status:</strong>
              <select name="status_id" class="form-control">
                  @foreach ($data['status'] as $s)
                  <option value="{{ $s->status_id }}">{{ $s->name }}</option>
                  @endforeach
              </select>
              @error('status_id')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
              <strong>Category:</strong>
              <select name="category_id" class="form-control">
                  @foreach ($data['categories'] as $category)
                  <option value="{{ $category->category_master_id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
              @error('category_id')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
              <strong>Product:</strong>
              <select name="product_id" class="form-control">
                  @foreach ($data['products'] as $p)
                  <option value="{{ $p->product_id }}">{{ $p->name }}</option>
                  @endforeach
              </select>
              @error('product_id')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="font-weight-bold">Image</label>
            {{-- <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"> --}}
        

            <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
            <p><label for="file" style="cursor: pointer;">Upload Image</label></p>
            <p><img id="output" width="350" /></p>

            <!-- error message untuk title -->
            @error('image')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
          </div>

              <!-- Display preview of the uploaded image -->
            <div class="mt-2" id="imagePreview" style="display: none;background-color:rgb(160, 77, 160)">
              <label class="font-weight-bold">Uploaded Image:</label>
              <img src="" alt="Uploaded Image" class="img-fluid" id="previewImage">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary ml-3">Submit</button>


</form>
        
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
                        ajax: "{{ url('imagemasters-list') }}",
                        columns: [
                                { data: 'id', name: 'id' },
                                { data: 'name', name: 'name' },
                                { data: 'email', name: 'email' },
                                { data: 'created_at', name: 'created_at' },
                                {data: 'action', name: 'action', orderable: false},
                              ],
                              order: [[0, 'desc']]
                    });
            
                $('body').on('click', '.delete', function () {
            
                    if (confirm("Delete Record?") == true) {
                    var id = $(this).data('id');
                      
                    // ajax
                    $.ajax({
                        type:"POST",
                        url: "{{ url('delete-imagemasters') }}",
                        data: { id: id},
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
    


<script>
  var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

@endpush

