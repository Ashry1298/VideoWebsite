<div>
<div class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h1 class="title">Latest videos</h1>
                <h5 class="description">Keep Learning , latest video based on published day</h5>
                 <h6>you can see more videos here</h6>
                <a href="{{ route('frontend.home') }}" class="btn btn-outline-primary btn-round" role="button" aria-disabled="true"> More Videos</a>

            </div>
        </div>
        <br>
        <br>
        <div class="text-left">
            @include('front-end.shared.video-row')
        </div>
    </div>
</div>
</div>


