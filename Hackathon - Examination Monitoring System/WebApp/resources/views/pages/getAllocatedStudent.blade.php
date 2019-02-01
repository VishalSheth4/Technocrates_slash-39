@extends('master')

@section('title')

Allocated Student

@endsection

@section('allocatedStudent')

    <div class="boxed">

        <div id="content-container">

            <div class="panel">
                <div class="panel-heading">
                    <h2 style="padding-left: 20px;">Allocated Students List</h2>
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
                           cellpadding="5"
                           cellspacing="5">
                        <thead>
                        <tr>
                            <th data-field="name" data-sortable="true">StudentName</th>
                            <th data-field="SeatNo" data-sortable="true">Student SeatNo</th>
                            <th data-field="studentInst" data-sortable="true">Student Institute</th>
                            <th data-field="studentCity" data-sortable="true">Student City</th>
                            <th data-field="ExamCenter" data-sortable="true">Exam Center</th>
                            <th data-field="ExamCity" data-sortable="true">Exam City</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($allocateStudents as $allocateStudent)
                            <tr>
                              <td>{{ $allocateStudent->Name }}</td>
                              <td>{{ $allocateStudent->SeatNo }}</td>
                              <td>{{ $allocateStudent->institute->InstName}}</td>
                              <td>{{ $allocateStudent->institute->InstCity}}</td>
                              <td>{{ $allocateStudent->InstName}}</td>
                              <td>{{ $allocateStudent->InstCity}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection