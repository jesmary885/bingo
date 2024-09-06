<div>
    @foreach($fichas_nuevas as $ficha)

    {{$ficha->numero}}

    @endforeach

    <script>
        Echo.channel('sorteo_fichas')
        .listen('NewFichaSorteo', (e) => {
            console.log(e);
        });
    </script>
</div>
