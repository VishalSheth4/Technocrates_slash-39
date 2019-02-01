@extends('master')

@section('title')

   Payment Status | Exam Monitoring

@endsection


@section('paymentContent')

    <div class="boxed">

        <div id="content-container">
            <div class="panel">
                <div class="panel-heading">
                    <div class="col-xs-9">
                    <h2 style="padding-left: 20px;">Payment Status</h2>
                   </div>
                    <div class="col-xs-3" style="margin:20px;">
                    <a href="{{ route('makePayment',['examId' => $examId]) }}"  class="form-control btn btn-primary">Make Payment</a>
                    </div>
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
                            <th data-field="id" data-sortable="true">Id</th>
                            <th data-field="name" data-sortable="true">Faculty Name</th>
                            <th data-field="email" data-sortable="true">Faculty Email</th>
                            <th data-field="role" data-sortable="true">Faculty Role</th>
                            <th data-field="ExamCenter" data-sortable="true">Exam Center</th>
                            <th data-field="payment" data-sortable="true">Payment Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($paymentFaculties as $paymentFaculty)
                            <tr>

                                <td>{{ $paymentFaculty->DeanId }}</td>
                                <td>{{ $paymentFaculty->DeanName }}</td>
                                <td>{{ $paymentFaculty->DeanEmail }}</td>
                                <td>{{ $paymentFaculty->Role}}</td>
                                <td>{{ $paymentFaculty->InstName }}</td>
                                @if($paymentFaculty->PaymentStatus == "Pending" )
                                <td>
                                    <a href="{{ route('pendingPayment',['id' => $paymentFaculty->DeanEmail,'exam' =>$paymentFaculty->ExamCode ])}}">
                                        <span style="color:orange;">{{ $paymentFaculty->PaymentStatus }}</span>
                                    </a>
                                </td>
                                @elseif($paymentFaculty->PaymentStatus == "Not Done")
                                <td>
                                    <span style="color:red;">{{ $paymentFaculty->PaymentStatus }}</span>
                                </td>
                                @else
                                <td>
                                    <span style="color:green;">{{ $paymentFaculty->PaymentStatus }}</span>
                                </td>
                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection
