@extends('admin.layout')
@section('content')
<div class="grid_10">
  <div class="box round first grid">
    <h2>Admin List</h2>
    <span class="success">
      @if (Session::get('message')!=null)
      {{ Session::get('message') }}
      @endif
    </span>
    <div class="block">
      <table class="data display datatable" id="example">
        <thead>

          <tr>
            <th width="10%">STT</th>
            <th width="25%">Admin Name</th>
            <th width="25%">Admin Email</th>
            <th width="10%">Level</th>
            <th width="10%">Delete</th>
            <th width="10%">Restore</th>
            <th width="10%">Trạng thái</th>
          </tr>

        </thead>
        <tbody>
          @foreach ($admins as $key => $item)
          <tr class="odd gradeX">
            <td>{{ ++$key }}</td>
            <td>{{ $item->adminName }}</td>
            <td>{{ $item->adminEmail }}</td>
            <td>{{ $item->level }}</td>
            <td><a onclick="return confirm('Do you want to delete? You cannot restore it')"
                href="{{ route('admindelete',['id'=>$item->id]) }}">Delete</a></td>
            <td><a href="{{ route('restoreadmin',['id'=>$item->id]) }}">Restore</a></td>
            <td>
              @if ($item->is_activated==1)
              Đã kích hoạt
              @else
              Chưa kích hoạt
              @endif
            </td>
          </tr>
          @endforeach


        </tbody>
      </table>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>

@endsection