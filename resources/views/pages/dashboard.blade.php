@extends('layouts.dashboard')

@section('content')
<div class="padding">
    <div class="row">
		  <div class="col-xs-6 col-sm-3">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	            <span class="w-48 rounded  accent">
	              <i class="fa fa-money"></i>
	            </span>
	          </div>
	          <div class="clear">
	            <h4 class="m-0 text-lg _300"><a href>Rs {{$debt}}</span></a></h4>
	            <small class="text-muted">Total Debt</small>
	          </div>
	        </div>
	    </div>
	    <div class="col-xs-6 col-sm-3">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	            <span class="w-48 rounded primary">
	              <i class="fa fa-money"></i>
	            </span>
	          </div>
	          <div class="clear">
	            <h4 class="m-0 text-lg _300"><a href>Rs {{$lm_expense}}</span></a></h4>
	            <small class="text-muted">Total Expenses</small>
	          </div>
	        </div>
	    </div>
      <div class="col-xs-6 col-sm-3">
          <div class="box p-a">
            <div class="pull-left m-r">
              <span class="w-48 rounded warn">
                <i class="fa fa-money"></i>
              </span>
            </div>
            <div class="clear">
              <h4 class="m-0 text-lg _300"><a href>Rs {{$lm_profit}}</span></a></h4>
              <small class="text-muted">Total Profit</small>
            </div>
          </div>
      </div>
	    <div class="col-xs-6 col-sm-3">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	            <span class="w-48 rounded warn">
	              <i class="fa fa-money"></i>
	            </span>
	          </div>
	          <div class="clear">
	            <h4 class="m-0 text-lg _300"><a href>{{$bt_sold}}</span></a></h4>
	            <small class="text-muted">Total Bottle Sold</small>
	          </div>
	        </div>
	    </div>
      <div class="col-xs-6 col-sm-3">
          <div class="box p-a">
            <div class="pull-left m-r">
              <span class="w-48 rounded warn">
                <i class="fa fa-money"></i>
              </span>
            </div>
            <div class="clear">
              <h4 class="m-0 text-lg _300"><a href>Rs {{$cash_in_hand}}</span></a></h4>
              <small class="text-muted">Cash in Hand</small>
            </div>
          </div>
      </div>
	</div>
    <div class="row">

      <div class="col-sm-12">
        <div class="box">
          <div class="box-header">
            <h3>Profit and Sales Data</h3>
            <small class="block text-muted">The data shows the earned profit(it does not include the debt amount) and expenses data and values.</small>
          </div>
          <div class="box-body">
            <div ui-jp="chart" ui-options=" {
              tooltip : {
                  trigger: 'axis'
              },
              legend: {
                  data:['Profit','Expenses']
              },
              calculable : true,
              xAxis : [
                  {
                      type : 'category',
                      data : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
                  }
              ],
              yAxis : [
                  {
                      type : 'value'
                  }
              ],
              series : [
                  {
                      name:'Profit',
                      type:'bar',
                      data:[
                        @php
                        $i=1;
                      @endphp
                      @foreach($purchases as $purchase)
                        {{$purchase}}
                        @if($i<count($purchases))
                        ,
                        @endif
                        @php
                            $i++;
                        @endphp
                      @endforeach
                      ],
                      markPoint : {
                          data : [
                              {type : 'max', name: 'Max'},
                              {type : 'min', name: 'Min'}
                          ]
                      },
                      markLine : {
                          data : [
                              {type : 'average', name: 'Average'}
                          ]
                      }
                  },
                  {
                      name:'Expenses',
                      type:'bar',
                      data:[
                          @php
                            $i=1;
                          @endphp
                          @foreach($expenses as $purchase)
                            {{$purchase}}
                            @if($i<count($purchases))
                            ,
                            @endif
                            @php
                                $i++;
                            @endphp
                          @endforeach
                      ],
                      markPoint : {
                          data : [
                              {name : 'Max', value : {{max($expenses)}}, xAxis: 7, yAxis: 183, symbolSize:18},
                              {name : 'Min', value : {{min($expenses)}}, xAxis: 11, yAxis: 3}
                          ]
                      },
                      markLine : {
                          data : [
                              {type : 'average', name : 'Average'}
                          ]
                      }
                  }
              ]
            }" style="height:300px" >
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
