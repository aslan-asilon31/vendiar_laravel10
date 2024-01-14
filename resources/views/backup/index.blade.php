@extends('../layouts/backend_layout')

@section('title','User Page')

@section('content')
<div class="col-lg-12 stretch-card">
  @include('sweetalert::alert')

  <a class="btn btn-primary" href="{{ route('backup.manual') }}">Backup Database</a>
</div>@endsection