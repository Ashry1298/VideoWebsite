<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-youtube"></i>
                </div>
                <p class="card-category">Videos Number</p>
                <h3 class="card-title">
                    {{ $videosCount }}
                </h3>

            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('videos.index') }}" class="warning-link">All Videos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-comments"></i>
                </div>
                <p class="card-category">Comments</p>

                <h3 class="card-title">
                    {{$commentsCount }}
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('videos.index') }}" class="warning-link">Check Videos </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">Skills</p>
                <h3 class="card-title">{{$skillsCount}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('skills.index') }}" class="warning-link">All Skills</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-tags"></i>
                </div>
                <p class="card-category">Tags</p>
                <h3 class="card-title">{{$tagsCount}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('tags.index') }}" class="warning-link">All Tags</a>
                </div>
            </div>
        </div>
    </div>
</div>
