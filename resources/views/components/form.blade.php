{!! Form::open(['url' => '/registration', 'files' => 'true']) !!}
<h1 class="text-center">Sign Up</h1>
<div class="form-group">
    {{ Form::Label('Enter name:', null) }}
    {{ Form::Text('name', '', ['placeholder' => 'Name', 'class' => 'form-control'] ) }}
</div>
<div class="text-danger">
    @if($errors->has('name'))
    {{$errors->first('name')}}
    @endif
</div>
<div class="form-group">
    {{ Form::Label('Enter username:', null) }}
    {{ Form::Text('user_name', '', ['placeholder' => 'Username', 'class' => 'form-control'] ) }}
</div>
<div class="text-danger">
    @if($errors->has('user_name'))
    {{$errors->first('user_name')}}
    @endif
</div>
<div class="form-group">
    {{ Form::Label('Email:', null) }}
    {{ Form::Email('email', '', ['placeholder' => 'Email', 'class' => 'form-control']) }}
</div>
<div class="text-danger">
    @if($errors->has('email'))
    {{$errors->first('email')}}
    @endif
</div>
<div class="form-group">
    {{ Form::Label('Enter password:', null) }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] ) }}
</div>
<div class="text-danger">
    @if($errors->has('password'))
    {{$errors->first('password')}}
    @endif
</div>
<div class="form-group">
    {{ Form::Label('Re-type password:', null) }}
    {{ Form::password('re_password', ['placeholder' => 'Re-type Password', 'class' => 'form-control'] ) }}
</div>
<div class="text-danger">
    @if($errors->has('re_password'))
    {{$errors->first('re_password')}}
    @endif
</div>
<div class="form-group">
    {{ Form::Label('Gender:', null) }}
    <br>
    {{ Form::radio('gender', 'male') }}
    {{ Form::Label('Male', null) }}
    <br>
    {{ Form::radio('gender', 'male') }}
    {{ Form::Label('Female', null) }}
</div>
<div class="text-danger">
    @if($errors->has('gender'))
    {{$errors->first('gender')}}
    @endif
</div>
<div class="form-group">
    {{ Form::Label('Date of birth:', null) }}
    {{ Form::Date('dob', '', ['class' => 'form-control']) }}
</div>
<div class="text-danger">
    @if($errors->has('dob'))
    {{$errors->first('dob')}}
    @endif
</div>
<div class="form-group">
    {{ Form::Label('Country:', null) }}
    {{ Form::select('country', ['','Pakistan','India','China','America','London'], ['class' => 'form-control']) }}
</div>
<div class="text-danger">
    @if($errors->has('country'))
    {{$errors->first('country')}}
    @endif
</div>
<div class="form-group">
    {{ Form::Label('Profile Picture:') }}
    {{ Form::File('profile_pic', ['class' => 'form-control']) }}
</div>
<div class="text-danger">
    @if($errors->has('profile_pic'))
    {{$errors->first('profile_pic')}}
    @endif
</div>
<div class="form-group text-center">
    {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
</div>
{!! Form::close() !!}