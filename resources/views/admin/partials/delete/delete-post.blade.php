<div class="modal fade" id="delete-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                        class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete post</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Do you want delete this post ?
                </div>

            </div>
            <div class="modal-footer ">
                <form action="{{ route('admin.posts.destroy', [$post->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Yes
                    </button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> No
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
