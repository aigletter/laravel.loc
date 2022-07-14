<html>
<head>
    <title>Laravel project</title>
</head>
<body>
<div class="container">
    <h1>User show</h1>
    <div class="content">
        <ul>
            <li>Id: {{ $user->id }}</li>
            <li>Name: {{ $user->name }}</li>
            <li>Email: {!! str_replace('@', '<span style="color: red">@</span>', $user->email) !!}</li>
        </ul>

        <?php if ($user->roles): ?>
            <?php foreach ($user->roles as $role): ?>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
