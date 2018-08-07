<div class="clearfix"></div>
@if(Auth::check())
    @if($user->id == Auth::user()->id)
        <div class="panel panel-default new-post-box">
            <div class="panel-body">
                <form id="form-new-post">
                    <input type="hidden" name="group_id" value="{{ $wall['new_post_group_id'] }}">
                    <textarea name="content" placeholder="Intern daily diary"></textarea>
                    <div class="image-area">
                        <a href="javascript:;" class="image-remove-button" onclick="removePostImage()"><i class="fa fa-times-circle"></i></a>
                        <img src="" />
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="button" class="btn btn-default btn-add-image btn-sm" onclick="uploadPostImage()">
                                <i class="fa fa-image"></i> Add Image
                            </button>
                            <input type="file" accept="image/*" class="image-input" name="photo" onchange="previewPostImage(this)">
                        </div>
                        <div class="col-xs-4">
                            <div class="loading-post">
                                <img src="{{ asset('images/rolling.gif') }}" alt="">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn btn-primary btn-submit pull-right" onclick="newPost()">
                                Post!
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endif

<div class="post-list-top-loading">
    <img src="{{ asset('images/rolling.gif') }}" alt="">
</div>

<div class="post-list">
    
   @if(!Auth::check()) 
        
        @if(count($posts) > 0)
            @foreach($posts as $post)
                @include('widgets.post_detail.single_post')
            @endforeach
        @else

            <div class="panel panel-default">
                <div class="panel-body subtitle text-center text-danger"><h2><b>No intern diary found</b></h2></div>
            </div>
        
        @endif

   @endif

</div>

<div class="post-list-bottom-loading">
    <img src="{{ asset('images/rolling.gif') }}" alt="">
</div>

<div class="modal fade " id="likeListModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Likes</h5>
            </div>

            <div class="user_list">

            </div>
        </div>
    </div>
</div>
