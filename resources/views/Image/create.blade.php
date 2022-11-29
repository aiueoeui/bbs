<!-- メッセージ -->
@if (count($errors) > 0)
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">
    <label for="jan">Janコード:</label>
    <input type="text" class="form-control" name="jan" value="">
    <br>
    <label for="name">商品名:</label>
    <input type="text" class="form-control" name="name" value="">
    <br>
    <label for="photo">画像ファイル（複数可）:</label>
    <input type="file" class="form-control" name="files[][photo]" multiple>
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-success"> Upload </button>
</form>
