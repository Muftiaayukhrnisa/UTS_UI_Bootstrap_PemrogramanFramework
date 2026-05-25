<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>