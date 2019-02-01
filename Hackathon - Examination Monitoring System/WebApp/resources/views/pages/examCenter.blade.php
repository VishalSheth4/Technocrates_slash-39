@extends('master')

@section('title')

  Exam Center | Exam Monitoring

@endsection


@section('examCenter')
    <div class="boxed">

        <div id="content-container">

            <div class="panel">
                <div class="panel-heading">
                    <h2 style="padding-left: 20px;">Exams Center</h2>
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
                            <th data-field="name" data-sortable="true">InstName</th>
                            <th data-field="status" data-sortable="true">InstCode</th>
                            <th data-field="InstName" data-sortable="true">Exam</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{ $data->InstName }}</td>
                                <td>{{ $data->InstCode }}</td>
                                <td>{{ $data->ExamName }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection
