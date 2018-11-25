
<table style="width:100%">
  <tr >
<td colspan="4" align="right"><b>Total:</b> {{App\cats::count()}}</td>
  </tr>
  <tr style="border-bottom:1px solid #ccc;">
    <th style="padding:10px">Category Name</th>

    <th>Update</th>
    <th>Remove</th>
  </tr>

  @foreach($data as $product)
    <tr  style="height:50px">
      <td style="padding:10px">{{$product->cat_name}}</td>
      <td><a class="btn btn-sm btn-fill btn-primary"
             href="{{url('/admin/editCategory')}}/{{$product->id}}">Edit</a></td>
      <td>
        <form method="post" action="{{url('admin/removeCategory')}}/{{$product->id}}">
          {!! Form::token() !!}
          {{ method_field('DELETE') }}
          <button type="submit" onclick="return confirm('Are you sure?')"
                  class="btn btn-sm btn-fill btn-primary">Remove</button>
        </form>
      </td>
    </tr>
  @endforeach

</table>
