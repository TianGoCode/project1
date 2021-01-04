<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <title>Document</title>
</head>
<body>

<form method="post" action="/test">
    @csrf
    <textarea class="form-control" id="cac" name="cac"></textarea>
    <button type="submit"> gửi lên server</button>
</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('cac', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });


</script>

</body>
</html>
