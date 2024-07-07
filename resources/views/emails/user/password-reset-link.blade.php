@extends('emails.base')

@section('mail-content')
    <h4>Hi {{ $the_name }},</h4>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p><a href="{{ $the_reset_url }}" target="_blank" style="display: inline-block; color: #ffffff; background-color: #ac1c20; border: solid 1px #ac1c20; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize;">Reset Password</a></p>
    <p>This password reset link will expire in 60 minutes.<br />If you did not request a password reset, no further action is required.</p>
    <hr />
    <p><small>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: <a href="{{ $the_reset_url }}">{{ $the_reset_url }}</a></small></p>
@endsection
