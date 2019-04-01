<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pocket Calculator</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 40px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content" style="width: 960px;">
                <div class="title m-b-md">
                   <div id="calcFrame">
  <form>
    <div id="calcScreenDiv"><input id="calcScreen" name="display" placeholder="0"></input></div>
      <table id="buttonsDiv">
        <tr>
          <td><input type="reset" value="AC" id="resetButton"></td>
          <td><button type="button" id="clearLast">CE</td> 
          <td><button type="button" onclick="display.value += '%'">%</td>
          <td><button type="button" onclick="display.value += '/'">/</td>
        </tr>
        <tr>
          <td><button type="button" onclick="display.value += '7'">7</td>
          <td><button type="button" onclick="display.value += '8'">8</td> 
          <td><button type="button" onclick="display.value += '9'">9</td>
          <td><button type="button" onclick="display.value += '*'">x</td>
        </tr>
        <tr>
          <td><button type="button" onclick="display.value += '4'">4</td>
          <td><button type="button" onclick="display.value += '5'">5</td> 
          <td><button type="button" onclick="display.value += '6'">6</td>
          <td><button type="button" onclick="display.value += '-'">-</td>
      </tr>
      <tr>
          <td><button type="button" onclick="display.value += '1'">1</td>
          <td><button type="button" onclick="display.value += '2'">2</td> 
          <td><button type="button" onclick="display.value += '3'">3</td>
          <td rowspan="2"><button id="plus" type="button" onclick="display.value += '+'">+</td>
      </tr>
      <tr>
          <td><button type="button" onclick="display.value += '0'">0</td>
          <td><button type="button" onclick="display.value += '.'">.</td> 
          <td><button type="button" onclick="old=display.value;display.value = eval(display.value);saveHistory(old,display.value)">=</td>
      </tr>
    </table>

   

  </form>
</div>

 <div id="historyBody"></div>


<style type="text/css">

    #calcFrame {
        float: left;
    }
    .success {
    background: #00BCD4;
    border: none;
    color: #fff;
    padding: 4px 12px;
    float:right;
    }
    #historyBody {
        float: right;
            float: right;
    margin-top: 140px;
    font-size: 17px;
    margin-left: 60px;
    width: 37%;
    }
    #calcFrame {
  width: 260px;
  margin-left: auto;
  margin-right: auto;
  background-color: #F5F5F5;
  padding: 8px;
  margin-top: 100px;
  border: solid 1px #E26458;
}

#calcScreenDiv {
  margin-left: 22px;
}

#calcScreen {
  width: 190px;
  background-color: white;
  margin-left: auto;
  margin-right: auto;
  text-align: right;
}

#buttonsDiv {
  width: 200px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 15px;
}

button {
  margin-bottom: 5px;
  background-color: #E26458;
  font-weight: bold;
  width: 40px;
  color: white;
}

#resetButton {
  margin-bottom: 5px;
  background-color: #E26458;
  font-weight: bold;
  width: 40px;
  color: white;
}

#plus {
  height: 55px;
}

/*===============  Media Queries ================*/

    /* Custom, iPhone Retina */
    @media only screen and (min-width : 320px) {
      
    }

    /* Extra Small Devices, Phones */
    @media only screen and (min-width : 480px) {
       
    }

    /* Small Devices, Tablets */
    @media only screen and (min-width : 768px) {
      
    }

    /* Medium Devices, Desktops */
    @media only screen and (min-width : 992px) {
    #calcFrame {
      width: 404px;
      margin-left: auto;
      margin-right: auto;
      padding: 16px;
      margin-top: 140px;
      border: solid 2px #E26458;
    }

    #calcScreenDiv {
    margin-left: 5px !important;
    font-size: 30px;
    }

    #calcScreen {
      width: 380px;
    }

    #buttonsDiv {
      width: 400px;
      margin-top: 15px;
    }

    button {
      margin-bottom: 5px;
      width: 80px;
      height: 45px;
      font-size: 24px;
    }

    textarea:focus, input:focus {
      outline: none;
    }

    #resetButton {
      margin-bottom: 5px;
      width: 80px;
      height: 45px;
      font-size: 24px;
    }
      #plus {
        height: 95px;
      }
    }

    /* Large Devices, Wide Screens */
    @media only screen and (min-width : 1200px) {
      
    }

    /* Very Large Devices, Wide Screens */
    @media only screen and (min-width : 1300px) {
      
    }

/*================================================*/
</style>

<script type="text/javascript">
    $('#clearLast').on('click',function () {
    //get the input's value
    var textVal = $('#calcScreen').val();
    //set the input's value
    $('#calcScreen').val(textVal.substring(0,textVal.length - 1));
});



function loadHistory(){
   
            $.ajax({
            dataType: "json",
            method: "GET",
            url: "<?php echo url('loadHistory', $parameters = array(), $secure = null);?>",
            data: { }
            })
            .done(function( msg ) {

             $("#historyBody").html(msg.list);
            });
}

loadHistory();

function saveHistory(old,calcNew){
    var old = old;
    var calcNew = calcNew;
   
            $.ajax({
            dataType: "json",
            method: "GET",
            url: "<?php echo url('calcSave', $parameters = array(), $secure = null);?>",
            data: { old: old,calcNew:calcNew}
            })
            .done(function( msg ) {
             loadHistory();
            });
}

</script>
                </div>  
            </div>
        </div>
    </body>
</html>
