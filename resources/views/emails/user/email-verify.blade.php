@extends('emails.base')

@section('mail-content')
    <h2>Hi {{ $the_name }},</h2>
    <p>We hope this message finds you well! 🌟 To ensure the security and smooth functioning of your account, we kindly ask you to verify your email address.</p>
    <p>
        Simply click on the "Verify email address" button below to get started:<br />
        <a href="{{ $the_confirm_url }}" target="_blank" style="display: inline-block; color: #ffffff; background-color: #ac1c20; border: solid 1px #ac1c20; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize;">Verify email address</a>
    </p>
    <p>By completing this quick step, you'll unlock all the amazing features and benefits of your account. 🚀 If you have any questions or need assistance, feel free to reach out to our support team.</p>
    <p>We can't wait to have you fully on board!</p>
    <hr />
    <p><small>If you're having trouble clicking the "Verify email address" button, copy and paste the URL below into your web browser: <a href="{{ $the_confirm_url }}">{{ $the_confirm_url }}</a></small></p>
@endsection
