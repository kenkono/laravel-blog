<div class="new-post mb-4">
    <form action="store" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="Share your thoughts..." name="content"></textarea>
        </div>
        <div class="text-right">
            <button class="create-post btn btn-primary" type="submit">Post</button>
        </div>
    </form>
</div>