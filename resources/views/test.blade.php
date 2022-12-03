
<form method="POST" action="{{ url('/send') }}">
    @csrf
    <input type="text" name="name" placeholder="名前を入力してください">
    <button type="submit">送信</button>
</form>

