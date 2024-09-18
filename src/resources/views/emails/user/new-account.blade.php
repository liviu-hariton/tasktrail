@extends('emails.base')

@section('mail-content')
    <h2>Hi {{ $the_name }},</h2>
    <p>Welcome to TaskTrail! We're thrilled to have you on board and excited to help you streamline your project management journey.</p>
    <p>At TaskTrail, we believe in making project management and task tracking effortless and enjoyable. Whether you're juggling multiple projects, collaborating with a team, or just trying to stay on top of your daily tasks, TaskTrail is designed to keep you organized and productive.</p>
    <p>Here’s a quick guide to help you get started:</p>
    <p><strong>Create Your First Project:</strong></p>
    <ul>
        <li>Start by setting up a new project. Give it a name, set deadlines, and add relevant details to ensure you have everything at your fingertips.</li>
    </ul>
    <p><strong>Organize Your Tasks:</strong></p>
    <ul>
        <li>Break down your projects into manageable tasks. Use tags, priorities, and due dates to keep everything in order.</li>
    </ul>
    <p><strong>Collaborate Seamlessly:</strong></p>
    <ul>
        <li>Invite your team members to collaborate. Assign tasks, share files, and communicate effortlessly within the app.</li>
    </ul>
    <p><strong>Stay on Track:</strong></p>
    <ul>
        <li>Use our powerful dashboard to monitor progress, track deadlines, and ensure nothing slips through the cracks.</li>
    </ul>
    <p>What's Next?</p>
    <p>Log in to your account and start exploring the features. Use the following credentials to login:</p>
    <ul>
        <li><strong>Username:</strong> {{ $the_username }}</li>
        <li><strong>Password:</strong> {{ $the_password }}</li>
    </ul>
    <p>If you have any questions or need assistance, feel free to reach out to our support team. We're here to help you make the most of TaskTrail.</p>
    <p>Leave no task uncharted!</p>
@endsection
