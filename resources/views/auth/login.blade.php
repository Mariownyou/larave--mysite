@extends('layouts.app')

@section('content')
    <div class="e2-login-sheet     e2-hideable       e2-show" id="e2-login-sheet">

        <div class="e2-login-window" id="e2-login-window">
            <div class="e2-login-window-col">
                <form action="{{ route('login') }}" method="post" class="form-login e2-enterable" id="form-login">
                    @csrf
                    <input type="text" name="email" value="smj510black@gmail.com" style="display: none">

                    <!-- <h1>Ваш пароль</h1> -->
                    <h2>Ваш пароль</h2>

                    <div class="e2-login-window-input-wrapper">
                        <span class="e2-login-window-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill-rule="evenodd" stroke="none" clip-rule="evenodd" d="M11 6h-1V4a4 4 0 0 0-8 0v2H1C0 6 0 7 0 7v7.999C0 15.998 1 16 1 16h10s1 0 1-1V7s0-1-1-1zM8 6H4V4a2 2 0 0 1 4 0v2z"></path></svg></span>
                        <input type="password" name="password" id="e2-password" class="text big input-disableable e2-login-window-input e2-login-window-password" autofocus="autofocus">
                    </div>

                    <label><a href="{{ route('password.request') }}">Я&nbsp;забыл</a></label>

                    <label><input type="checkbox" class="checkbox input-disableable" name="is_public_p" id="is_public_pc">&nbsp;Чужой&nbsp;компьютер</label>

                    <div class="e2-login-window-button">
                        <button type="submit" id="login-button" class="e2-button e2-submit-button input-disableable">
                            Войти        </button>
                        &nbsp;&nbsp;&nbsp;
                        <span class="e2-svgi e2-login-window-password-checking" style="display: none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle r="39" cx="50" cy="50" transform="rotate(-90 50 50)" stroke-width="6" fill="none" stroke-dasharray="245" stroke-dashoffset="61"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1333ms" begin="indefinite" repeatCount="1"></animateTransform></circle></svg></span><span id="password-correct" class="e2-svgi" style="display: none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" d="M1 9.034l4.517 5.547L15 2.42V.92L5.526 13.157 1 7.646z"></path></svg></span>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

