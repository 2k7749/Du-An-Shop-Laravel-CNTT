@extends('layout_cart')
@section('contentdetails')
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form action="{{URL::to('/login-customer')}}" method="POST">
                    {{csrf_field()}}
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Đăng nhập
                    </h4>
                    <?php
                        $mess = Session::get('mess');
                        if ($mess!=null) {
                            echo '<span style="text-align: center;color: red;width: 100%;">',$mess,'</span>';
                            Session::put('mess',null);
                        }
                     ?>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email_account" placeholder="Enter Your Email">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password_account" placeholder="Enter Your Password">
                    </div>
                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                        đăng nhập
                    </button>
                </form>
            </div>


            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <form action="{{URL::to('/add-customer')}}" method="POST">
                    {{csrf_field()}}
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Đăng kí
                    </h4>
                    <?php
                        $mess = Session::get('mess');
                        if ($mess!=null) {
                            echo '<span style="text-align: center;color: red;width: 100%;">',$mess,'</span>';
                            Session::put('mess',null);
                        }
                    ?>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="customer_name" placeholder="Enter Your Name">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="customer_email" placeholder="Enter Your Email">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="customer_phone" placeholder="Enter Your Phone">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="customer_address" placeholder="Enter Your Address">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="customer_password" placeholder="Enter Your Password">
                    </div>
                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                        đăng kí
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection