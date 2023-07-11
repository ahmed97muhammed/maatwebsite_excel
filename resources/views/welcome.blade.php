<form method="post" action="{{route('items.import')}}" enctype='multipart/form-data'>
Import Excel Items
@csrf
<input type="file" name="file">

<input type="submit" value="save">
</form>

<a href="{{route('items.export')}}">Export Excel Items</a>