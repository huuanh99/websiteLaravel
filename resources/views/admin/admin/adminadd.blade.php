@extends('admin.layout')
@section('content')
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm admin</h2>
        <span class="success">
            @if (Session::get('message')!=null)
            {{ Session::get('message') }}
            @endif
        </span>
        <div class="block">
            <form action="{{ route('addadmin') }}" method="post">
                @csrf
                <table class="form">
                    <tr>
                        <td>
                            <label>Admin Name</label>
                        </td>
                        <td>
                            <input required name="adminName" type="text" placeholder="Enter Admin Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Admin Email</label>
                        </td>
                        <td>
                            <input required name="adminEmail" type="email" placeholder="Enter Email..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                          <input required name="adminPass" type="password" placeholder="Enter Password..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
 
@endsection
