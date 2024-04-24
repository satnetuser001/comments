<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Comment Page</title>
    <link rel="stylesheet" type="text/css" href="/styles/main.css">
</head>
<body>
    <h1>
        Create Comment Page
    </h1>
    <div>
        <a href="{{  route('home')  }}">Home</a>
    </div>

    <form action="{{ route('store') }}" method="POST">
        @csrf

        <!-- User Name -->
        <div class="">
            <label><b>User Name</b></label>
            <input name="userName" type="text" value="{{ old('userName') }}" class="">
            <div class="errorMessage">
                @error('userName')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!-- E-mail -->
        <div class="">
            <label><b>Email</b></label>
            <input name="email" type="text" value="{{ old('email') }}" class="">
            <div class="errorMessage">
                @error('email')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!-- Home Page -->
        <div class="">
            <label><b>Home Page</b></label>
            <input name="homePage" type="text" value="{{ old('homePage') }}" class="">
            <div class="errorMessage">
                @error('homePage')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!-- CAPTCHA -->
        <div>
            <div>
                <?php echo Captcha::img('flat'); ?>
            </div>
            <input name="captcha" type="text" autocomplete="off" class="">
            <div class="errorMessage">
                @error('captcha')
                    <span><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            
        </div>

        <!-- Text (Comment) -->
        <div class="">
            <label><b>Text</b></label>
            <textarea name="text" class="">{{ old('text') }}</textarea>
            <div class="errorMessage">
                @error('text')
                    <span ><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <input type="submit" class="" value="Добавить">
    </form>

</body>
</html>