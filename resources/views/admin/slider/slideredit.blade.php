@extends('admin.layout')
@section('content')
<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa slider</h2>
    <span class="success">
      @if (Session::get('message')!=null)
      {{ Session::get('message') }}
      @endif
    </span>
    <div class="block">
      <form action="{{ route('editslider') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="sliderId" value="{{ $slider->id }}">
        <table class="form">
          <tr>
            <td>
              <label>Old Image</label>
            </td>
            <td>
              <img width="300" src="{{ asset('uploads') }}/{{ $slider->image }}" alt=""><br />
            </td>
          </tr>

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
              <input type="submit" name="submit" Value="UPDATE" />
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