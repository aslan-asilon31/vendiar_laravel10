@extends('../layouts/backend_layout')

@section('title','User Page')

@section('content')
<div class="col-lg-12 stretch-card">
  @include('sweetalert::alert')

  <div class="row">
      <a class="btn btn-primary " style="margin:3px;" href="{{ route('backup.manual') }}">Backup Database</a>
      <a class="btn btn-primary " style="margin:3px;" href="">Backup Factory Folder</a>
      <a class="btn btn-primary " style="margin:3px;" href="">Backup Seeder Folder</a>
  </div>
</div>@endsection