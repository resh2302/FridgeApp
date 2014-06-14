@extends('layouts.default')
@section('content')
<body>

    <header>
      <div id="fridge-header">
        <!-- <div class="back">
          <img src="images/black_back.png" alt="back">
        </div> -->
      <ul id="fridge_sort" class="fridge_hide">
        <li>ALL</li>
        <li>MEAT</li>
        <li>DAIRY</li>
        <li>VEGGIE/ FRUIT</li>
      </ul>

      <ul id="fridge_sa" class="fridge_hide">
        <li><i id="fridge_add_icon" class="fa fa-plus fa-lg"></i></li>
        <li><i id="fridge_search_icon" class="fa fa-search fa-lg"></i></li>
      </ul>

      <form id="fridge_search_form">
        <input type="text" name="fridge_search" id="fridge_search" placeholder="search">
         <button type="submit" id="fridge_cancel">
                <i class="fa fa-times-circle fa-2x"></i>
         </button>
      </form>


      </div>
    </header>
    <div  id="fridge_body">
      <br>
      <br>
      <br>
      <br><br>

      <ul>
        @foreach ($data['fridgeFood'] as $ff)
          <li>
            {{ $ff['Name'] }}
            <img src="{{ URL::asset($ff['ImgURL'])}}">
            <div>
              {{ -- link_to("/users/{$user->email}", Delete) -- }}
              {{ -- link_to("/users/{$user->email}", Edit) --}}
            </div>
          </li>
        @endforeach

      </ul>
      <!-- {{$data['fridgeFood']}} -->
    </div> <!-- end fridge_body -->



     <div  id="fridge_add">
     

      <form>
         <h3>Enter your information here</h3>
         <div class="clear"></div>
         <br/>
         <input type="text" name="fridge_food_name" id="fridge_food_name" placeholder="Enter Food Name">
         <div class="clear"></div>
         <input type="text" name="fridge_food_expiary" id="fridge_food_expiary" placeholder="Choose Expiary Date">

         <button type="submit" id="fridge_btn_ex">
          <i class="fa fa-calendar fa-3x"></i>
         </button>

      </form>
      <div class="clear"></div>
      <div  id="fridge_or">

      <img src="{{ URL::asset('images/em-dash.png') }}" alt="em dash">

      

      <h4>OR</h4>

      <img src="{{ URL::asset('images/em-dash.png')}}" alt="em dash" />

      </div> <!-- end fridge_or -->

      <div id="fridge_scan">
        <button type="submit" id="fridge_btn_scan">
          <p>SCAN AN ITEM</p><i class="fa fa-barcode fa-4x"></i>
        </button>

      </div> <!-- end frige_scan -->
      <div id="fridge_add_step1">  
        <button type="submit" id="fridge_add_can1" class="fridge_btn_cancel">
          CANCEL
        </button>
        <button type="submit" id="fridge_add_nxt" class="fridge_btn_nxt">
          NEXT
        </button>
      </div> <!-- end fridge_add_step1 -->

      
    </div> <!-- end fridge add -->


     <div id="fridge_add_step2">
      <h3>ITEM SUMMARY</h3>

    </div> <!-- END fridge_add_step2 -->

    <footer class="fridge_footer">
      <ul>
        <li><img src="{{ URL::asset( 'images/footer_barcode.png' ) }}" alt="scan"><p>Barcode</p></li>
        <li><img src="{{ URL::asset('images/footer_fridge.png' ) }}" alt="fridge"><p>Fridge</p></li>
        <li><img src="{{ URL::asset('images/footer_list.png' ) }}" alt="grocery list"><p>Grocery</p></li>
        <li><img src="{{ URL::asset('images/footer_rec.png' ) }}" alt="recipe generator"><p>Recipes</p></li>
        <li><img src="{{ URL::asset('images/footer_add.png' ) }}" alt="invite friend"><p>Invite</p></li>
      </ul>

    </footer>
    <script src="{{ URL::asset('/assets/javascripts/jquery.js')}}"></script>
  <script src="{{ URL::asset('/assets/javascripts/demo.js')}}"></script>
   <script>

   //onclick of search show search panel


    $(document).ready(function(){
      $("#fridge_search_icon").click(function(){
        $(".fridge_hide").hide(200);
        $("#fridge_search_form").slideDown(500);

      });
    });

    //onclick of search show add panel


    $(document).ready(function(){
      $("#fridge_add_icon").click(function(){
        $("#fridge_body").fadeOut(200);
        $("#fridge_add").slideDown(500);
      });
    });

     $(document).ready(function(){
      $("#fridge_add_can1").click(function(){
        $("#fridge_add, #fridge_add_step2").fadeOut(200);
        $("#fridge_body").slideDown(500);

      });
    });

     $(document).ready(function(){
      $("#fridge_add_nxt").click(function(){
        $("#fridge_add").fadeOut(200);
        $("#fridge_add_step2").show(500);

      });
    });
    </script>
</body>
@stop