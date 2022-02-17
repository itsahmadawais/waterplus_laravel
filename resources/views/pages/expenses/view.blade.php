@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="box">
    <div class="box-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>{{$expense->title." @".date('d M , Y',strtotime($expense->created_at))}}</h2>
          </div>
          <div class="col-md-8 text-right">
            <button class="btn info" data-toggle="modal" data-target="#m-a-f">Add Item</button>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table id="DataTables" ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:60%">Item</th>
            <th  style="width:20%">Price</th>
            <th  style="width:20%" class="nosort"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($billableItems as $item)
          <tr>
            <td>{{$item->title}}</td>
            <td>{{$item->price}}</td>
            <td>
                <form method="POST" action="{{url('billableitems/'.$item->id)}}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="md-btn md-raised red"><i class="fa fa-trash"></i></button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="m-a-f" class="modal fade show" data-backdrop="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Expense</h5>
      </div>
      <form method="POST" action="{{url('billableitems')}}">
      @csrf
      <input type="hidden" name="expense_id" value="{{$expense->id}}">
      <div class="modal-body p-lg">
        <div class="form-group">
          <label for="expense_title">Title</label>
          <input type="ntext" class="form-control" id="expense_title" name="expense_title" placeholder="Petrol Expense" required="">
        </div>
        <div class="form-group">
          <label for="expense_price">Price</label>
          <input type="text" class="form-control" id="expense_price" name="expense_price" placeholder="150">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn danger p-x-md">Save</button>
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div>
</div>
@endsection
