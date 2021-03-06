@extends('user.layouts.app')

@section('content')
  <h1>確認</h1>
  @if($products)
    @foreach($products as $product)
      <div class="border-bottom mb-3 p-3">
        <form action="/cart/delete" method="post">
          @csrf
          <div class="row align-items-center">
            <input type="hidden" value="{{ $carts_id[$count] }}" name="cart_id">
            <div class="col mb-0">{{ $product->name }}</div>
            <div class="col-auto">
              <span class="mr-3">{{ $amount[$count] }}冊</span>
              <span>{{ $sales_price[$count++] }}円</span>
            </div>
          </div>
        </form>
      </div>
    @endforeach
    <div class="text-right">
      <span>合計</span>
      <span>{{ $total }}円</span>
    </div>
    <div class="text-right">
      <span>ご利用可能ポイント</span>
      <span>{{ $point->point }}pt</span>
    </div>
    <div class="text-right mb-3">
      <span>購入後ポイント</span>
      <span>{{ $remaining_points }}pt</span>
    </div>
    @if($remaining_points >= 0)
      <div class="text-right">
        <a href="/cart" class="mr-3">カートへ戻る</a>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


      </div>
    @else
      <p class="text-danger">
        ※合計金額がご利用可能ポイントより多いため購入できません。<br>
        カートから商品を削除するか、ギフトコードを入力し、ポイントを増やして下さい。
      </p>
      <div class="text-right">
        <a href="/cart" class="mr-3">カートへ戻る</a>
        <a href="/mypage/gift">ギフトコード入力画面へ</a>
      </div>
    @endif
  @else
    <p>商品がありません。</p>
    <div class="text-right">
      <a href="/cart">カートへ戻る</a>
    </div>
  @endif
@endsection