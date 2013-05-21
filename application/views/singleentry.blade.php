@include ('layout.header')
<div>
    <h1>{{ $entry[0]->title }}</h1>

    <p> {{$entry[0]->body}}</p>
    <small>{{$entry[0]->username}} | {{date("F j Y, G:i:s", strtotime($entry[0]->created_at))}} | 
        @if(is_object(Auth::user()))
        @if(Auth::user()->id == $entry[0]->users_id)
        <a href="#editModal" data-toggle="modal"><i class="icon-edit"></i></a>
        @include('editentry')
        <a href="#deleteModal" data-toggle="modal"><i class="icon-trash"></i></a>
        @include('deleteModal')
        @endif
        @endif
    </small>
    <hr />
    <div class="row-fluid">
        <h4>Comments</h4>
        @if(!empty($comments))
        @foreach ($comments as $comment)
        <div class="row-fluid">
            <div class="span5 offset0 comment">
                <div class="comment-data">{{$comment->comment}}</div>
                <div class="posted-by">
                    Posted by: {{$comment->username}} on {{$comment->created_at}}
                </div>
            </div>
        </div>
        @endforeach
        @else
        Nog geen comments
        @endif
        <br />
        {{HTML::link('article/'.$entry[0]->entryid.'/comment/add', 'Comment here!', array('class'=>'ajax-link'))}}
    </div>
</div>
</div>
<div id="AjaxResult"></div>
<script type="text/javascript">
         
    $(document).ready(function() {
        // Initialise the table
        $('.ajax-link').click(function() {
            $.ajax({
                async: true, 
                url: $(this).attr('href'), 
                success: function(data){
                    $('#AjaxResult').html(data);
                    $('.addCommentModal').modal('show');
                }});
                        
            return false;
        });
    });
</script>