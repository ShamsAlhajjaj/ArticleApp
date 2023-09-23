<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit article</title>
</head>
<body>
    <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="{{ $article->subject }}" required><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ $article->content }}</textarea><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br>

        <button type="submit">Save Changes</button>
    </form>

</body>
</html>