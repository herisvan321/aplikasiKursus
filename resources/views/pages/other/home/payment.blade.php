@extends('layouts.othertempdash')

@section('content')
@include('pages.other.home.include.banner')
@include('pages.other.home.include.navbar')

<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
        <div class="card">
            <div class="container ">
                <br>
                <form action="{{ route("peserta.payment.put", [base64_encode($data->id_peserta_kursus)]) }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    @csrf
                    @method("PUT")
                    <div class="col-md-8">
                        <h3>Pembayaran</h3>
                        <br>
                        <table>
                            <tr>
                                <td valign="top"><b>Title</b></td>
                                <td valign="top">:</td>
                                <td>{!! $data->subkursus->judul_sub_kursus !!}</td>
                            </tr>
                            <tr>
                                <td valign="top"><b>Description</b></td>
                                <td valign="top">:</td>
                                <td>{!! $data->subkursus->deskripsi !!}</td>
                            </tr>
                            <tr>
                                <td valign="top"><b>Order Time</b></td>
                                <td valign="top">:</td>
                                <td>{!! $data->waktu !!}</td>
                            </tr>
                            <tr>
                                <td valign="top"><b>Deadline</b></td>
                                <td valign="top">:</td>
                                <td>{!! $data->deadline !!}</td>
                            </tr>
                            @if($data->kondisi == 1)
                            <tr>
                                <td style="min-width: 150px" valign="top"><b>Payment Date</b></td>
                                <td valign="top">:</td>
                                <td>{!! $data->tgl_pembayaran !!}</td>
                            </tr>
                            <tr>
                                <td valign="top"><b>Status</b></td>
                                <td valign="top">:</td>
                                <td><b>Proses</b></td>
                            </tr>
                            @endif
                            <tr>
                                <td valign="top"><b>Payment</b></td>
                                <td valign="top">:</td>
                                <td>
                                    @if($data->kondisi == 0)
                                    <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*" required>
                                    <span style="color:red">*</span> file images
                                    @elseif($data->kondisi == 1)
                                    <img src="{{ asset('/kursus/buktiPembayaran/'.$data->bukti_pembayaran) }}" alt="{{ $data->bukti_pembayaran }}" style="max-width:750px">
                                    @endif

                                </td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="col-md-4">
                        @if($data->kondisi != 1)
                        <button type="submit" class="genric-btn primary radius">Submit</button>
                        <button type="reset" class="genric-btn warning radius">Clear</button>
                        @endif
                        <button type="button" class="genric-btn default radius" onclick="history.back();">Back</button>
                    </div>
                </div>
            </form>
            <br>
            </div>
        </div>
        <br>
    </div>
</section>
@endsection