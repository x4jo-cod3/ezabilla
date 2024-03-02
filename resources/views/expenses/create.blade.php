@extends('layouts.app')
@section('content')

<div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Add Expenses</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('expenses.store') }}">
                    @csrf
                    <div class="form-row">
                    <div class="form-group col-md-4">
                                    <label for="name">Item Name</label>
                                    <select name="name" class="form-control" id="name" required>
                                        <option value="">Please choose The Item Name</option>
                                        <option>مستلزمات طبيه</option>
                                        <option>مناديل</option>
                                        <option>نظافه</option>
                                        <option>بوفيه</option>
                                        <option>صيانه</option>
                                        <option>ادوات مكتبيه</option>
                                        <option>مرتبات</option>
                                        <option>انتقالات</option>
                                        <option>سلف</option>
                                        <option>استردادت</option>
                                        <option>كهرباء</option>
                                        <option>مياه</option>
                                        <option>انترنت و شحن</option>
                                        <option>اقساط اجهزه</option>
                                        <option>ايجار الفرع</option>
                                        <option>دعايه</option>
                                        <option>مصروفات شخصيه</option>
                                        <option>رسوم و تراخيص</option>
                                        <option>صيدليه و ادويه</option>
                                        <option>اكل العمليات للمريض</option>
                                        <option>اكل الدكتور محمد</option>
                                        <option>فيزا فوري</option>
                                        <option>مستلزمات د محمد السيد</option>
                                        <option>أخرى</option>
                                    </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="item_price">Price</label>
                            <input type="number" name="item_price" class="form-control" id="item_price" required>
                        </div>

                                
                        <div class="form-group col-md-4">
                            <label for="details">Details</label>
                            <textarea name="details" class="form-control" id="details" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection


