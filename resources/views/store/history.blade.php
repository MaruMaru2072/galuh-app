@extends('layouts.app')
@section('content')
    @foreach ($historyheader as $hh)
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item m-auto mt-3 w-50">
                <h2 class="accordion-header" id="flush-heading{{ $hh->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapse{{ $hh->id }}" aria-expanded="false"
                        aria-controls="flush-collapse{{ $hh->id }}">
                        Transaction Date {{ $hh->transactionDate }}
                    </button>
                </h2>
                <div id="flush-collapse{{ $hh->id }}" class="accordion-collapse collapse"
                    aria-labelledby="flush-heading{{ $hh->id }}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Sub Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hh->connectHistoryDetail as $item)
                                    <tr>
                                        <td>{{ $item->connectItem->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->qty * $item->connectItem->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <?php
                                    $totalqty=0;
                                    $totalprice=0;
                                    foreach ($hh->connectHistoryDetail as $cd) {
                                        $totalqty += $cd->qty;
                                        $totalprice += $cd->qty * $cd->connectItem->price;
                                    }
                                    ?>
                                    <th scope="col">Total</th>
                                    <th scope="col">{{ $totalqty }} item(s)</th>
                                    <th scope="col">IDR {{ $totalprice }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
