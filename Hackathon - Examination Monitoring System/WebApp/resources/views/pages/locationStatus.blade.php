@extends('master')

@section('title')

    Faculty Status | Exam Monitoring

@endsection


@section('facultyStatus')
    <div class="boxed">

        <div id="content-container">

            <div class="panel">
                <div class="panel-heading">
                    <h2 style="padding-left: 20px;">Location Status ( Exam : {{ $examName }})</h2>
                </div>
                <div class="panel-body">
                    <table id="demo-custom-toolbar" class="demo-add-sarahcheck" data-toggle="table"
                           data-url="data/bs-table.json"
                           data-toolbar="#demo-delete-row"
                           data-search="true"
                           data-sort-name="id"
                           data-page-list="[5, 10, 20]"
                           data-page-size="10"
                           data-pagination="true"
                           >
                        <thead>
                        <tr align="center">
                            <th data-field="name" data-sortable="true">Faculty Name</th>
                            <th data-field="name" data-sortable="true">Email</th>
                            <th data-field="InstName" data-sortable="true">Allocated Center</th>
                            <th data-field="role" data-sortable="true">Role</th>
                            <th data-field="status" data-sortable="true" colspan="3">Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($datas))
                            @foreach($datas as $data)
                            <tr>
                                <td>{{ $data->DeanName }}</td>
                                <td>{{ $data->DeanEmail }}</td>
                                <td>{{ $data->InstName }}</td>
                                <td>{{ $data->Role }}</td>
                               @foreach($data->deanInfoStatus as $status)
                                    @if(isset($status->Status))
                                     <td>
                                         @if($status->Status == 1)
                                             <a href="#" data-toggle="modal" data-target="#myModal-{{ $status->DeanLocationStatusId }}"><div  class="status status-success" data-toggle="tooltip" title="{{ $status->created_at }}"></div></a>

                                             <div id="myModal-{{ $status->DeanLocationStatusId }}" class="modal fade" role="dialog">
                                                 <div class="modal-dialog">

                                                     <!-- Modal content-->
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                             <h4 class="modal-title">{{ $data->DeanName }}</h4>
                                                         </div>
                                                         <div class="modal-body">
                                                             <img src="{{ URL::to('images/'.$status->imageName)}}" height="400" style="width: 100%"/>
                                                             <div style="margin-top: 10px;">
                                                                 <p style="color:black;"><b>Capture Time : </b> {{ $data->created_at   }}</p>
                                                                 <p style="color:black;"><b>Current Location : </b>
                                                                         Inside , {{ $data->InstName }}
                                                                 </p>
                                                             </div>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                         </div>
                                                     </div>

                                                 </div>
                                             </div>


                                        @else
                                             <a href="#" data-toggle="modal" data-target="#myModal-{{ $status->DeanLocationStatusId }}"><div class="status status-failure" data-toggle="tooltip" title="{{ $status->created_at }}"></div></a>


                                             <div id="myModal-{{ $status->DeanLocationStatusId }}" class="modal fade" role="dialog">
                                                 <div class="modal-dialog">

                                                     <!-- Modal content-->
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                             <h4 class="modal-title">{{ $data->DeanName }}</h4>
                                                         </div>
                                                         <div class="modal-body">
                                                             <img src="{{ URL::to('images/'.$status->imageName)}}" height="400" style="width: 100%"/>
                                                             <div style="margin-top: 10px;">
                                                                 <p style="color:black;"><b>Capture Time : </b> {{ $data->created_at   }}</p>
                                                                 <p style="color:black;"><b>Current Location : </b>
                                                                         Outside , {{ $data->InstName }}
                                                                 </p>
                                                             </div>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                         </div>
                                                     </div>

                                                 </div>
                                             </div>












                                         @endif


                                     </td>
                               @endif
                               @endforeach

                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>






    </div>

@endsection
