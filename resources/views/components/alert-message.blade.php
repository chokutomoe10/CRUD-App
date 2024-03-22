<!-- Ini cara pertama -->
<!-- @props([
    "message"
]) -->

<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}>
    <h5>{{$message}}</h5>
</div>

<!-- <div class="alert alert-success">
    <h5>{{$message}}</h5>
</div> -->
