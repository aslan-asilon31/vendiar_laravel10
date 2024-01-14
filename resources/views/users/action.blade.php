<a style="text-align:center;margin:2px;" href="{{ route('users.edit', ['user_id' => $user->user_id]) }}" data-toggle="tooltip" data-original-title="Edit" class="edit  btn btn-sm btn-success">
    <i class="mdi mdi-pen menu-icon"></i>
</a>

<a style="text-align:center;margin:2px;" href="javascript:void(0)" data-id="" data-toggle="tooltip" data-original-title="Delete" class="delete  btn btn-sm btn-danger">
	<i class="mdi mdi-delete menu-icon"></i>
</a>

<a style="text-align:center;margin:2px;" href="javascript:void(0)" data-toggle="tooltip" data-original-title="Log" class="log btn btn-sm btn-warning">
	<i class="mdi mdi-history menu-icon"></i>
</a>

<a style="text-align:center;margin:2px;" href="{{ route('users.show', ['user_id' => $user->user_id]) }}" data-toggle="tooltip" data-original-title="Detail" class="Detail  btn btn-sm btn-info">
	<i class="mdi mdi-eye menu-icon"></i>
</a>