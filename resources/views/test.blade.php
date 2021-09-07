<form action="{{ url('test/order') }}" method="POST">
    @csrf
    <input type="text" name="user_id" value="1">

</form>
