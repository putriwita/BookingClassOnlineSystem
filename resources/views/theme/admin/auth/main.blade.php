<!DOCTYPE html>
<html lang="en">
<head>
    @include('theme.admin.auth.head')
</head>
<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <section class="sign-in-page">
        {{$slot}}
    </section>
    @include('theme.admin.auth.js')
</body>
</html>