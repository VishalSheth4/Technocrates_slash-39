@extends('master')

@section('title')

    Allocated Faculty

@endsection

@section('allocatedFaculty')

    <div class="boxed">

        <div id="content-container">

            <div class="panel">
                <div class="panel-heading">
                    @if(isset($allocateFaculties[0]['ExamDate']))
                    <h2 style="padding-left: 20px;">Allocated Faculty List --- {{ $allocateFaculties[0]['ExamName'] }}
                        ({{ $allocateFaculties[0]['ExamDate'] }})
                    </h2>
                    @endif
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
                            <th data-field="name" data-sortable="true">Faculty Name</th>
                            <th data-field="email" data-sortable="true">Faculty Email</th>
                            <th data-field="role" data-sortable="true">Faculty Role</th>
                            <th data-field="ExamCenter" data-sortable="true">Exam Center</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($allocateFaculties as $allocateFacutly)
                            <tr>
                                <td>{{ $allocateFacutly->DeanName }}</td>
                                <td>{{ $allocateFacutly->DeanEmail }}</td>
                                <td>{{ $allocateFacutly->Role}}</td>
                                <td>{{ $allocateFacutly->InstName }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection