<div>
    <h3>Привет, {{ Auth::user()->name }}</h3>
    <br>
    <a href="{{ route('admin.index') }}" style="color: red;">В админку</a>
    <br>
    <a href="{{ route('logout') }}" style="color: red;">Выход</a>
</div>
