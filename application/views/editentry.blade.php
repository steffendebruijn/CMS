<div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit entry</h3>
    </div>
    <div class="modal-body">
        <p>{{ Form::open('article/edit/'.$entry[0]->entryid, 'POST') }}
            {{ Form::text('title', $entry[0]->title, array('class'=>'input-xlarge')) }}<br />
            {{ Form::textarea('body', strip_tags($entry[0]->body), array('class'=>'input-xxlarge'))}}<br />
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        {{ Form::close() }}
    </div>
</div>


