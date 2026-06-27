@extends('layouts.app')

@section('content')
<div class="content">
    <div class="text-content">
        <div class="text">
            <h1><b>Поздравляем!</b></h1><br>
            <div class="text-h3">
                <h3>
                    Вы набрали <b>{{ $score }}</b> баллов!
                </h3>
                <h3>
                    Спасибо за участие! Продолжайте развивать свои знания о театре и классической литературе. Готовы попробовать снова или пройти другие викторины? Жмите кнопку ниже и начните заново!
                </h3>
            </div>

            <a href="{{ url('/') }}"><button class="next_submit" type="button">ЗАНОВО</button></a>
        </div>
    </div>
</div>
@endsection