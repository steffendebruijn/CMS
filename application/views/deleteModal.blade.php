<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit entry</h3>
    </div>
    <div class="modal-body">
        <p>
            Are you sure you want to delete this entry?
            {{ Form::open('article/delete', 'POST') }}
            {{ Form::hidden('delete', $entry[0]->entryid) }}
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete</button>
        {{ Form::close() }}
    </div>
</div>


