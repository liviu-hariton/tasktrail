@extends('emails.base')

@section('mail-content')
    <h2>Hi {{ $the_name }},</h2>
    <p>You are receiving this email because your password was updated.</p>
    <p>Your new password is: <strong>{{ $the_new_password }}</strong></p>
    <p>If you did not request a password change, please contact us immediately.</p>
@endsection
