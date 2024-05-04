@extends('layouts.basic')
@section('title', 'Create Comment Page')

@section('content')
    <div class="createPage">
        <div>
            <a class="button" href="{{  route('home')  }}">Домой</a>
        </div>

        <form class="createForm" action="{{ route('store') }}" method="POST">
            @csrf

            <div class="commentHead">
                <div>
                    Создать комментарий
                </div>
            </div>

            <!-- User Name -->
            <div class="input">
                <label>Имя автора:</label>
                <input name="userName" type="text" value="{{ old('userName') }}">
                <div class="errorMessage">
                    @error('userName')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- E-mail -->
            <div class="input">
                <label>Email:</label>
                <input name="email" type="text" value="{{ old('email') }}">
                <div class="errorMessage">
                    @error('email')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- Home Page -->
            <div class="input">
                <label>Доманняя страница:</label>
                <input name="homePage" type="text" value="{{ old('homePage') }}">
                <div class="errorMessage">
                    @error('homePage')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- CAPTCHA -->
            <div class="input">
                <label>Введите символы с картинки:</label>
                <div>
                    <?php echo Captcha::img('flat'); ?>
                </div>
                <input name="captcha" type="text" autocomplete="off">
                <div class="errorMessage">
                    @error('captcha')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- Text (Comment) -->
            <div class="input">
                <label>Комментарий:</label>
                <textarea name="text">{{ old('text') }}</textarea>
                <div class="errorMessage">
                    @error('text')
                        <span ><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <input type="submit" class="submit" value="Создать">
        </form>
    </div>
@endsection