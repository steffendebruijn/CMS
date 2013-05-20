@if(!Auth::guest())
<div id="addCommentModal" class="modal hide fade addCommentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add comment</h3>
    </div>
    <div class="modal-body">

        <p>{{ Form::open('article/'.$entry_id.'/comment/'.$comment_id, 'POST') }}
            {{ Form::textarea('body', NULL, array('class'=>'input-xxlarge'))}}<br />
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        {{ Form::close() }}
    </div>
</div>
@else
<div id="loginModal" class="modal hide fade addCommentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Login first</h3>
    </div>
    <div class="modal-body" id="loginModalBody">
        <p>@include('loginmini')<br />
        </p>
    </div>
    <div class="modal-footer">
        <button type="submit" onsubmit="login()" class="btn btn-primary" id="ajaxLogin">Login</button>
        {{ Form::close() }}
    </div>
</div>
<span id="commenturl" commenturl="{{URL::current();}}"></span>
<script type="text/javascript">
         
    $(document).ready(function() {

            $('#ajaxLogin').click(function login() {              
            var jqxhr = $.post($('#ajaxLoginForm').attr('action'), $('#ajaxLoginForm').serialize());
            jqxhr.always(function(data){
                if(data == true){
                    $.ajax({
                        async: true, 
                        url: $('#commenturl').attr('commenturl'), 
                        success: function(data){
                            $('#AjaxResult').html(data);
                            $('#loginModal').modal('hide');
                            $('.modal-backdrop').fadeOut('fast');
                            $('#addCommentModal').modal('show');
                            
                        }});
                } else {
                    $('#loginModalBody').html(data);
                }
            });
            return false;
        });
    });
</script>
@endif