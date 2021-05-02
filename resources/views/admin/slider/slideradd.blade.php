@extends('admin.layout')
@section('content')
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm slider</h2>
        <span class="success">
            @if (Session::get('message')!=null)
            {{ Session::get('message') }}
            @endif
        </span>
        <div class="block">
            <form action="{{ route('addslider') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="form">         
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input required type="file" name="image" />
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
