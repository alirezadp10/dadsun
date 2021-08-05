<form class="mt-4 mb-4"
      method="post"
      action="{{ route('comment.store') }}">
    @csrf
    <input hidden
           name="commentable_id"
           value="{{ $commentable_id }}">
    <input hidden
           name="commentable_type"
           value="{{ $commentable_type }}">
    <div class="form-group">
                    <textarea type="text"
                              class="form-control"
                              name="body"
                              id="body"
                              placeholder="Write new comment.."></textarea>
    </div>
    <button type="submit"
            class="btn btn-primary">Submit
    </button>
</form>
