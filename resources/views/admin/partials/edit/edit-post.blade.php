<div class="modal fade" id="edit-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="edit"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.posts.update', [$post->id]) }}" method="post"
                  enctype="multipart/form-data" id="form-edit-posts">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit post</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_post" id="id_post" value="{{ $post->id }}">
                        <input class="form-control" name="name" type="text" placeholder="Enter name post"
                               value="{{ $post->name }}">
                    </div>
                    <div class="form-group">
                        <textarea rows="2" class="form-control" name="description"
                                  placeholder="Enter description">{{ $post->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Update
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
