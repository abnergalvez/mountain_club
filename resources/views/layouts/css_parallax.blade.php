<style media="screen">
@foreach( $parallaxes as $parallax )
    @if($parallax->order == 0 )

    .parallax_d {
        float: left;
        position: relative;
        width: 100%;
        height: 400px;
        text-align: center;
        color: #fff;
        margin-top: 60px;
        padding-top: 70px;
        background: url('/img/parallaxes/{{ $parallax->photo }}') no-repeat center top fixed;
        background-size: cover;
        background-color: #000;
    }

    @endif

    @if($parallax->order == 1 )
    .parallax_a {
        float: left;
        position: relative;
        width: 100%;
        height: 400px;
        text-align: center;
        color: #fff;
        background: url('/img/parallaxes/{{ $parallax->photo }}') no-repeat center top fixed;
        background-size: cover;
        margin-top: 10px;
        padding-top: 80px;
        background-color: #000;
    }

    @endif
    @if($parallax->order == 2 )
    .parallax_b {
        float: left;
        position: relative;
        width: 100%;
        height: 400px;
        text-align: center;
        color: #fff;
        margin-top: 60px;
        padding-top: 50px;
        background: url('/img/parallaxes/{{ $parallax->photo }}') no-repeat center top fixed;
        background-size: cover;
        background-color: #000;
    }
    @endif

    @if($parallax->order == 3 )

    .parallax_c {
    	float: left;
    	position: relative;
    	width: 100%;
    	height: 400px;
    	text-align: center;
    	color: #fff;
    	margin-top: 60px;
    	padding-top: 50px;
    	background: url('/img/parallaxes/{{ $parallax->photo }}') no-repeat center top fixed;
    	background-size: cover;
    	background-color: #000;
    }

    @endif



@endforeach
</style>
