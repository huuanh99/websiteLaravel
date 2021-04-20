@extends('admin.layout')
@section('content')
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">
            <span class="success">
                @if (Session::get('message')!=null)
                {{ Session::get('message') }}
                @endif
            </span>
            <form action="{{ route('changingPassword') }}" method="POST">
                @csrf
                <table class="form">
                    <tr>
                        <td>
                            <label>Old Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter Old Password..." name="oldpass" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>New Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                        </td>
                    </tr>


                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

@endsection